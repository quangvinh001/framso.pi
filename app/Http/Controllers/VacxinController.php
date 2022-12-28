<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Vacxin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacxinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $stt ="1";
        $title = "VACXIN" ;
        $pet = Pet::all();
        $vacxin = Vacxin::all();
        return view('admin.vacxin-list', compact('vacxin','pet', 'title','stt'));
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
        // $id= 
         $vacxin = new Vacxin();
         $vacxin->id_pet = $request->id;  
         $vacxin->name = $request->name;
         $vacxin->price = $request->price;
         $vacxin->num = $request->num;
         $vacxin->unit = $request->unit;
         $vacxin->image = $request->image_file;
         $vacxin->note = $request->note;
        $vacxin->save();
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
        $pet = Pet::all();
        $vacxin = Vacxin::firstWhere('id', $id);
        return view('admin.vacxin-edit', compact('title','pet', 'vacxin'));
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
        
        $vacxin = Vacxin::find($id);
        $vacxin->id_pet = $request->id;  
        $vacxin->name = $request->name;
        $vacxin->price = $request->price;
        $vacxin->num = $request->num;
        $vacxin->unit = $request->unit;
        $vacxin->image = $request->image_file;
        $vacxin->note = $request->note;
        $vacxin->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacxin = Vacxin::find($id);
        $vacxin->delete();
        return redirect()->route('vacxins.index')->with('success', 'Bạn đã xóa thành công');
    }
}
