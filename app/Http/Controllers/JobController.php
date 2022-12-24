<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $data = [];
    public function index()
    {
        $title = "CÔNG VIỆC";
        $jobs= Job::all();
        // dd($jobs);
        return view('admin.jobs.job-list', compact('jobs', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jobs = new Job();
        $jobs->id_user = $request->id_user;  
        $jobs->id_food = $request->id_food;
        $jobs->id_vacxin = $request->id_vacxin;
        $jobs->name = $request->name;
        $jobs->note = $request->note;
        $jobs->note = $request->num;
        $jobs->note = $request->status;
        $jobs->save();
        return redirect()->back()->with('success', 'Thêm thành công');
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
        $title = "CÔNG VIỆC";
        $jobs = Job::firstWhere('id', $id);
        return view('admin.jobs.job-edit', compact('title', 'jobs'));
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
        $jobs = Job::find($id);
        $jobs->id_user = $request->id_user;  
        $jobs->id_food = $request->id_food;
        $jobs->id_vacxin = $request->id_vacxin;
        $jobs->name = $request->name;
        $jobs->note = $request->note;
        $jobs->note = $request->num;
        $jobs->note = $request->status;
        $jobs->save();

        return redirect()->route('jobss.index')->with('success', 'Bạn đã cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobs = Job::find($id);
        $jobs->delete();
        return redirect()->route('jobs.index')->with('success', 'Bạn đã xóa thành công');
    }
}
