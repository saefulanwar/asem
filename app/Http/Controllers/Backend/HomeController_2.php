<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Uuid;
use App\Models\Payment;
use App\Models\AbstractPaper;
use Intervention\Image\Facades\Image;

class HomeController_2 extends BackendController
{
    protected $paymentStatus;
    protected $uploadPaymentPath;
    protected $uploadAbstractPath;

    public function __construct()
    {
        parent::__construct();

        $this->paymentStatus = 2;
        $this->uploadPaymentPath = public_path(config('cms.payment.directory')); 
        $this->uploadAbstractPath = public_path(config('cms.abstract.directory'));        
    }

    public function index(Request $request)
    {
    	$user = $request->user();
        $payment = Payment::where('user_id',$user->id)->first();

        if($payment){

            if($user->hasRole(['participant'])){
                $status = $payment->payment_status_id;
                // dd($status);

                if($status == 2 || $status == 3){
                    return redirect('/backend/home/paymentApproved');
                }
                elseif($status == 1)
                {
                    return redirect('/backend/home/paymentApproved');
                }
                elseif($status == 4)
                {
                    return redirect('/backend/home/myTicket');
                }
                else
                {
                    return view('backend.home.participant._participant-home');
                }
            }
            elseif($user->hasRole(['localspeaker','internationalspeaker']))
            {
                return view('backend.home.speaker._speaker-home');
            }
            else
            {
                return view('backend.home');
            }
        }else{
            if($user->hasRole(['participant']))
            {
                return view('backend.home.participant._participant-home');
            }
            elseif($user->hasRole(['localspeaker']))
            {
                $author = $request->user();
                $status = '';
                $abstracts = AbstractPaper::where('author_id',$author->id)->first();
                if($abstracts){
                    if($abstracts->status_id == 2){
                        $status = $abstracts->status_id;
                        $file = $abstracts->file;
                        return view('backend.home.speaker._speaker-home',compact('status','file'));
                    }else{
                        $status = $abstracts->status_id;
                        return view('backend.home.speaker._payment-proof', compact('status')); 
                    }    
                }else{
                        return view('backend.home.speaker._speaker-home',compact('status'));
                }                
            }
        }
    }

    public function edit(Request $request)
    {
        $user = $request->user();

        return view('backend.home.edit', compact('user'));
    }

    public function update(Requests\AccountUpdateRequest $request)
    {
        $user = $request->user();

        $user->update($request->all());

        return redirect()->back()->with("message","Acount was update successfully!");
    }

    public function paymentProof(Requests\PaymentProofRequest $request)
    {
        $participant = $request->user()->id;

        $payment_proof_file = $this->handleFileRequest($request);

        // dd($payment_proof_file);

        $payments = new Payment();
        $payments->id = Uuid::generate(4);
        $payments->user_id = $participant;
        $payments->payment_status_id = $this->paymentStatus;
        $payments->payment_proof = $payment_proof_file;

        $payments->save();

        return redirect('/backend/home/paymentApproved');
    }


    private function handleFileRequest($request)
    {
        if ($request->hasFile('file'))
        {
            $image       = $request->file('file');
            $fileName    = $image->getClientOriginalName();
            $destination = $this->uploadPaymentPath;

            $successUploaded = $image->move($destination, $fileName);

            if ($successUploaded)
            {
                $width     = config('cms.payment.thumbnail.width');
                $height    = config('cms.payment.thumbnail.height');
                $extension = $image->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);

                Image::make($destination . '/' . $fileName)
                    ->resize($width, $height)
                    ->save($destination . '/' . $thumbnail);
            }

        }

        return $fileName;
    }

    protected function paymentApproved(Request $request)
    {
        $user = $request->user();
        $payment = Payment::where('user_id',$user->id)->first();
        $status = $payment->payment_status_id;
        $file = $payment->payment_proof;
        
        return view('backend.home.participant._payment-approved', compact('status','file'));
    }

    protected function myTicket(Request $request)
    {
        $user = $request->user();
        $payment = Payment::where('user_id',$user->id)->first();
        $status = 4;

        $this->paymentSaveStatus($payment->id,$status);

        return view('backend.home.participant._my-ticket',compact('user','payment'));
    }

    protected function paymentSaveStatus($id, $status)
    {
         $payments = Payment::findOrFail($id);
         
         $data['payment_status_id'] = $status; 
         
         $payments->update($data);
    }

    /** Speakers Function **/

    //upload abstract

    public function uploadAbstract(Requests\UploadAbstractRequest $request)
    {
        // dd($request);

        $author = $request->user()->id;

        if ($request->hasFile('file'))
        {
            $image       = $request->file('file');
            $fileName    = $image->getClientOriginalName();
            $destination = $this->uploadAbstractPath;

            $successUploaded = $image->move($destination, $fileName);

        }

        // dd($payment_proof_file);

        $abstracts = new AbstractPaper();
        $abstracts->id = Uuid::generate(4);
        $abstracts->title = $request->title;
        $abstracts->category_id = $request->category;
        $abstracts->presentation_id = $request->presentation;
        $abstracts->author_id = $author;
        $abstracts->file = $fileName;
        $abstracts->status_id = 2;

        $abstracts->save();

        return redirect('/backend/home/abstractStatus');
    }

    //redirect to abstract status
    
    public function abstractStatus(Request $request) 
    {
        $author = $request->user();
        $abstracts = AbstractPaper::where('author_id',$author->id)->first();
        $status = $abstracts->status_id;
        $file = $abstracts->file;
        //if state is approved then go to upload payment proof
        if($status == 1)
        {
            return view('backend.home.speaker._payment-proof', compact('status'));
        }
        else
        {
            return view('backend.home.speaker._speaker-home',compact('status','file'));
        }
    }

}
