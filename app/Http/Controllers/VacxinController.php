<?php

namespace App\Http\Controllers;

use App\Models\Vacxin;
use Illuminate\Http\Request;

class VacxinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "VACXIN" ;
        $vacxins = Vacxin::all();
        return view('admin.vacxins.vacxin-list', compact('vacxins', 'title'));
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
         $vacxins = new Vacxin();
         $vacxins->id_pet = $request->id_pet;  
         $vacxins->name = $request->name;
         $vacxins->price = $request->price;
         $vacxins->num = $request->num;
         $vacxins->image = $request->image;
         $vacxins->note = $request->note;
        $vacxins->save();
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
        $title = "VACXIN";
        $vacxins = Vacxin::firstWhere('id', $id);
        return view('admin.vacxins.vacxin-edit', compact('title', 'vacxins'));
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
        $vacxins = Vacxin::find($id);
        $vacxins->id_pet = $request->id_pet;  
        $vacxins->name = $request->name;
        $vacxins->price = $request->price;
        $vacxins->num = $request->num;
        $vacxins->image = $request->image;
        $vacxins->note = $request->note;
        $vacxins->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacxins = Vacxin::find($id);
        $vacxins->delete();
        return redirect()->route('vacxin.index')->with('success', 'Bạn đã xóa thành công');
    }
}
