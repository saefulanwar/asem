<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Paper;
use App\Models\PaperReview;
use App\Models\PaperStatus;
use Uuid;

class PaperreviewController extends BackendController {

    protected $uploadPath;

    public function __construct() {
        parent::__construct();
        $this->paymentPath = public_path(config('cms.revpaper.directory'));
    }

    public function index(Request $request) {
        $status = $request->get('status', '2');
        $record = Paper::filterstatus($status)->paginate($this->limit);
        $recCount = Paper::count();
        $statusList = PaperStatus::pluck("id", "name");
        $statusLink = $this->statusLink($statusList);
        unset($statusList['Pending']);
        return view("backend.paperreview.index", compact('record', 'recCount', 'statusList', 'statusLink', 'status'));
    }

    private function statusLink($rec) {
        $return = array();
        foreach ($rec as $key => $r) {
            $return[$r] = array(
                'name_status' => $key,
                'count' => Paper::filterstatus($r)->count()
            );
        }
        return $return;
    }

    public function edit($id) {
        $rec = Paper::findOrFail($id);
        return view("backend.paperreview.edit", compact('rec'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'file' => 'required|mimes:pdf,doc,docx',
            'sugestion' => 'required',
        ]);
        $file = $request->file('file');
        $hashFilename = NULL;
        if (!empty($file)) {
            $fileName = $file->getClientOriginalName();
            $hashFilename = md5($request->user()->id) . '-' . $fileName;
            $destination = $this->paymentPath;
            $successUploaded = $file->move($destination, $hashFilename);
        }

        $newrec = new PaperReview;
        $newrec->id = Uuid::generate(4);
        $newrec->sugestion = $request->sugestion;
        $newrec->paper_id = $id;
        $newrec->reviewer_id = $request->user()->id;
        $newrec->paper_revision_file = $hashFilename;
        $saved = $newrec->save();
        
        $rec = Paper::findOrFail($id);
        $rec->update(array("status_id" => '1'));
        return redirect()->route("paperreview.index")->with('message', 'Paper review was updated successfully!');
    }

}
