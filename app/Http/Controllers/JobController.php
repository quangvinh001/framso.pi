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
        $jobs->id_role = 2;  //level=1: admin; level=2:kỹ thuật; level=3: khách hàng
        $jobs->name = $request->name;
        $jobs->email = $request->email;
        // $jobs->password = Hash::make($request->password);
        $jobs->phone = $request->phone;
        $jobs->address = $request->address;
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
        $jobs->id_role = $request->id_role;  //level=1: admin; level=2:kỹ thuật; level=3: khách hàng
        $jobs->name = $request->name;
        $jobs->email = $request->email;
        // $jobs->password = Hash::make($request->password);
        $jobs->phone = $request->phone;
        $jobs->address = $request->address;
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
