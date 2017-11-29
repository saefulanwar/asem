<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Uuid;
use App\Models\Payment;
use App\Models\AbstractPaper;
use App\Models\Paper;
use App\Models\PaperRevised;
use Intervention\Image\Facades\Image;
use Auth;
use DB;

class HomeController extends BackendController
{
   protected $paymentPath;
   protected $abstractPath;
   protected $paperPath;
   protected $revisedPath;
   protected $paymentStatus;
   protected $abstractStatus;
   protected $paperStatus;

   public function __construct()
   {
   		parent::__construct();
   		$this->paymentPath = public_path(config('cms.payment.directory')); 
   		$this->abstractPath = public_path(config('cms.abstract.directory'));
   		$this->paperPath = public_path(config('cms.paper.directory'));
   		$this->revisedPath = public_path(config('cms.revised.directory'));
   		$this->paymentStatus = config('cms.payment_status');
   		$this->paperStatus = config('cms.paper_status');
   		$this->abstractStatus = config('cms.abstract_status');
   }

   public function index(Request $request)
    {
    	$user = $request->user();
        if ($user->hasRole('participant')){
        	return redirect('backend/home/participantPage');
        }
        elseif ($user->hasRole(['localspeaker','internationalspeaker']))
        {
        	return redirect('backend/home/speakerPage');
        }
        return view('backend.home.index');
    }
    public function participantPage(Request $request)
    {
    	$user = $request->user();
    	//cek payment participant
    	$payment = Payment::where('user_id',$user->id)->first();
    	//show payment status if payment not null
    	if($payment){
    		$payment_status = $payment->payment_status_id;
    		$payment_file = $payment->payment_proof;
    		//redirect to ticket if status approved
    		if($payment_status == 1){
    			return redirect('backend/home/myTicketParticipant');
    		}
    		//return to view 
    		return view('backend.home.participant._payment-status-pending', compact('payment_status','payment_file'));
    	}
    	return view('backend.home.participant._payment-form');
    } 
    public function postPaymentProof(Request $request)
    {
    	// validate input
    	$this->validate($request,[
    		'file' => 'required|max:2040|mimes:jpg,jpeg,png'
    		]);
    	// post data to database
    	$user = $request->user();

    	$payments = new Payment();
    	$payments->id = Uuid::generate(4);
    	$payments->user_id = $user->id;
    	$payments->payment_status_id = $this->paymentStatus;
    	$payments->payment_proof = $this->handlePaymentFile($request);

    	$payments->save();

    	// redirect to backend/participantPage
    	return redirect('backend/home/participantPage');
    }

    private function handlePaymentFile($request)
    {
    	if ($request->hasFile('file'))
        {
            $image        = $request->file('file');
            $fileName     = $image->getClientOriginalName();
            $hashFilename = md5($request->user()->id).'-'.$fileName;
            $destination  = $this->paymentPath;

            $successUploaded = $image->move($destination, $hashFilename);

            if ($successUploaded)
            {
                $width     = config('cms.payment.thumbnail.width');
                $height    = config('cms.payment.thumbnail.height');
                $extension = $image->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);

                Image::make($destination . '/' . $hashFilename)
                    ->resize($width, $height)
                    ->save($destination . '/' . $thumbnail);
            }
        }

            return $hashFilename;    	
    }

    public function myTicketParticipant()
    {
    	return view('backend.home.participant._my-ticket');
    }

    //speaker page

    public function speakerPage(Request $request)
    {
    	$user = $request->user();   


    	$paperRevised = PaperRevised::where('author_id',$user->id)->first();

    	if($paperRevised)
    	{
    		return redirect('backend/home/myTicketSpeaker');
    	}			
    	
    	$papers = Paper::where('author_id', $user->id)->first();
    	if($papers)
    	{
    		$status = $papers->status_id;
    		if($status == 1)
    		{
    			return redirect('backend/home/uploadRevisedPaperForm'); 				

    		}
    		return redirect('/backend/home/uploadPaper');
    	}

    	$payments = Payment::where('user_id',$user->id)->first();
    	if($payments)
    	{
    		$status = $payments->payment_status_id;
    		if($status == 1)
    		{
    			return redirect('/backend/home/uploadPaperForm');
    		}
    		return redirect('/backend/home/speakerPayment');
    	}

    	$abstracts = AbstractPaper::with('category','presentation')->where('author_id',$user->id)->first();
    	if($abstracts)
    	{
    		$status = $abstracts->status_id;
    		$abstract_file = $abstracts->file;
    		if($status == 1)
    		{
    			return redirect('/backend/home/abstractApprove');
    		}
    		return view('backend.home.speaker._abstract-status-pending', compact('abstracts'));
    	} 

    	return view('backend.home.speaker._abstract-form');
    }

    public function postAbstract(Request $request)
    {
    	//validate input
    	$this->validate($request, [
    		'title' => 'required|min:3',
    		'category' => 'required',
    		'presentation' => 'required',
    		'file' => 'required|max:2040|mimes:doc,docx'
    		]);

    	$user = $request->user();

    	$abstracts = new AbstractPaper();
    	$abstracts->id = Uuid::generate(4);
    	$abstracts->title = $request->title;
    	$abstracts->status_id = $this->abstractStatus;
    	$abstracts->category_id = $request->category;
    	$abstracts->presentation_id = $request->presentation;
    	$abstracts->author_id = $user->id;
    	$abstracts->file = $this->abstractHandleFile($request);

    	$abstracts->save();

    	return redirect('backend/home/speakerPage');
    }

    private function abstracthandleFile($request)
    {
    	if ($request->hasFile('file'))
        {
            $image        = $request->file('file');
            $fileName     = $image->getClientOriginalName();
            $hashFilename = md5($request->user()->id).'-'.$fileName;
            $destination  = $this->abstractPath;

            $successUploaded = $image->move($destination, $hashFilename);            
        }  
        return $hashFilename;  	
    }

    public function abstractApprove()
    {
    	//when abstract approve, return view payment proof
    	return view('backend.home.speaker._payment-form');
    }
    public function postSpeakerPayment(Request $request)
    {
    	// validate input
    	$this->validate($request,[
    		'file' => 'required|max:2040|mimes:jpg,jpeg,png'
    		]);
    	// post data to database
    	$user = $request->user();

    	$payments = new Payment();
    	$payments->id = Uuid::generate(4);
    	$payments->user_id = $user->id;
    	$payments->payment_status_id = $this->paymentStatus;
    	$payments->payment_proof = $this->handlePaymentFile($request);

    	$payments->save();

    	return view('backend.home.speaker._payment-status-pending', compact('payments'));
    }

    public function getSpeakerPayment(Request $request)
    {
    	$user = $request->user();

    	$payments = Payment::where('user_id',$user->id)->first();

    	if($payments->payment_status_id == 1){
    		return redirect('backend/home/uploadPaperForm');
    	}

    	return view('backend.home.speaker._payment-status-pending', compact('payments'));
    }

    public function getUploadPaper(Request $request)
    {
    	$user = $request->user();

    	$papers = Paper::where('author_id',$user->id)->first();

    	if($papers->status_id == 1){
    		return redirect('backend/home/uploadRevisedPaper');
    	}

    	return view('backend.home.speaker._paper-status-pending', compact('papers'));
    }

    public function uploadPaperForm()
    {
    	return view('backend.home.speaker._paper-form');
    }    

    public function postUploadPaper(Request $request)
    {
    	//validate input
    	$this->validate($request,[
    		'title' => 'required|min:3|unique:papers',
    		'category' => 'required',
    		'presentation' => 'required',
    		'file' => 'required|max:2040|mimes:doc,docx'
    		]);

    	//get user
    	$user = $request->user();

    	//handle file upload
    	$paperFile = $this->handlePaperFile($request);

    	//save to database
    	$papers = new Paper();
    	$papers->id = Uuid::generate(4);
    	$papers->title = $request->title;
    	$papers->category_id = $request->category;
    	$papers->presentation_id = $request->presentation;
    	$papers->author_id = $user->id;
    	$papers->status_id = $this->paperStatus;
    	$papers->file = $paperFile;

    	$papers->save();

    	//go to speaker page and redirect to uploadPaper 
    	return redirect('backend/home/speakerPage');
    }


    private function handlePaperFile(Request $request)
    {
    	if ($request->hasFile('file'))
        {
            $image        = $request->file('file');
            $fileName     = $image->getClientOriginalName();
            $hashFilename = md5($request->user()->id).'-'.$fileName;
            $destination  = $this->paperPath;

            $successUploaded = $image->move($destination, $hashFilename);
            
        }  
        return $hashFilename;
    }

    public function uploadRevisedPaperForm(Request $request)
   	{
    	$user = $request->user();
    	//get paper review table for user
    	$paperRevised = DB::table('paper_review')
    					->join('papers','papers.id','paper_review.paper_id')
    					->join('users','users.id','paper_review.reviewer_id')
    					->join('status','status.id','papers.category_id')
    					->join('presentation','presentation.id','papers.presentation_id')    					
    					->select('paper_review.sugestion','paper_review.paper_revision_file','papers.title',
    						'papers.file','papers.id as paper_id','status.name as category','presentation.name as presentation')
    					->where('papers.author_id',$user->id)
    					->first();
    					
    	//return view upload paper form
    	return view('backend.home.speaker._revised-paper-form', compact('paperRevised'));
    }

    public function postRevisedPaperForm(Request $request)
    {
    	$this->validate($request,[
    		'file' => 'required|max:2040|mimes:doc,docx'
    		]);
    	$user = $request->user();

    	$revisedPaperFile = $this->handleRevisedFile($request);

    	$revised = new PaperRevised();
    	$revised->id = Uuid::generate(4);
    	$revised->paper_id = $request->paper_id;
    	$revised->author_id = $user->id;
    	$revised->file_has_revised = $revisedPaperFile;

    	$revised->save();

    	return redirect('backend/home/speakerPage');
    }


    private function handleRevisedFile(Request $request)
    {
    	if ($request->hasFile('file'))
        {
            $image        = $request->file('file');
            $fileName     = $image->getClientOriginalName();
            $hashFilename = md5($request->user()->id).'-'.$fileName;
            $destination  = $this->revisedPath;

            $successUploaded = $image->move($destination, $hashFilename);
            
        }  
        return $hashFilename;
    }

    public function myTicketSpeaker()
    {
    	return view('backend.home.speaker._my-ticket');
    }

    /**
    * Profile
    */
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



}
