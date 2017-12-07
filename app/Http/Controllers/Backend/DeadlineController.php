<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Deadline;

class DeadlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deadlines      = Deadline::paginate(20);
        $deadlinesCount = Deadline::count();

        return view("backend.deadline.index", compact('deadlines', 'deadlinesCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deadlines = new Deadline();
        return view("backend.deadline.create", compact('deadlines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Deadline::create($request->all());

        return redirect("/backend/deadline")->with("message", "New deadline was created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deadlines = Deadline::findOrFail($id);

        return view("backend.deadline.edit", compact('deadlines'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Deadline::findOrFail($id)->update($request->all());

        return redirect("/backend/deadline")->with("message", "Deadline was updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deadline = Deadline::findOrFail($id);

        $deadline->delete();

        return redirect("/backend/deadline")->with("message", "Deadline was deleted successfully!");
    }
}
