<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\AbstractPaper;
use App\Models\PaperStatus;
use Uuid;

class ApprovalabstractController extends BackendController {

    protected $uploadPath;

    public function __construct() {
        parent::__construct();
    }

    public function index(Request $request) {
        $status = $request->get('status','2');
        $record = AbstractPaper::filterstatus($status)->paginate($this->limit);
        $recCount = AbstractPaper::count();
        $statusList = PaperStatus::pluck("id","name");
        $statusLink = $this->statusLink($statusList);
        unset($statusList['Pending']);
        return view("backend.proveabstract.index", compact('record', 'recCount','statusList','statusLink','status'));
    }
    
    private function statusLink($rec){
        $return  = array();
        foreach($rec as $key=>$r){
            $return[$r] = array(
                'name_status'=>$key,
                'count'=>AbstractPaper::filterstatus($r)->count()
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
        $rec = AbstractPaper::findOrFail($id);
        $rec->update(array("status_id"=>$request->input('status_id')));
        return redirect()->route("proveabstract.index")->with('message', 'Abstract was updated successfully!');
    }

}
