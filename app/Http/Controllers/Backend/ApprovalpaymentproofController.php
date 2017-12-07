<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\PaymentStatus;
use Intervention\Image\Facades\Image;
use Uuid;

class ApprovalpaymentproofController extends BackendController {

    protected $uploadPath;

    public function __construct() {
        parent::__construct();
        $this->uploadPath = public_path(config('cms.image.directory'));
    }

    public function index(Request $request) {
        $status = $request->get('status','2');
        $record = Payment::filterstatus($status)->paginate($this->limit);
        $recCount = Payment::count();
        $statusList = PaymentStatus::pluck("id","status");
        $statusLink = $this->statusLink($statusList);
        unset($statusList['Pending']);
        unset($statusList['Ticket']);
        return view("backend.provepayment.index", compact('record', 'recCount','statusList','statusLink','status'));
    }
    
    private function statusLink($rec){
        $return  = array();
        foreach($rec as $key=>$r){
            $return[$r] = array(
                'name_status'=>$key,
                'count'=>Payment::filterstatus($r)->count()
            );
        }
        return $return;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id) {
        $rec = Payment::findOrFail($id);
        $rec->update(array("payment_status_id"=>$request->input('payment_status_id')));
        return redirect()->route("provepaymentproof.index")->with('message', 'Payment proof was updated successfully!');
    }

}
