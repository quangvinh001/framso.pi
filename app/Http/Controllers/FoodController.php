<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    public function __construct()   
    {
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $key = "1";
        $title = "THỨC ĂN";
        $food = Food::all();
        return view('admin.food-list', compact('food', 'title','key'));
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
       
        $food = new Food();
        $food->id_supplier ="1";
        $food->name = $request->name;
        $food->price = $request->price;
        $food->num = $request->num;
        $food->image = $request->image_file;
        $food->unit = $request->unit;
        $food->note = $request->note;
        $food->save();
        // dd($food);
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
        $title = "THỨC ĂN";
        $food = Food::firstWhere('id', $id);
        return view('admin.food-edit', compact('title', 'food'));
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
        $food = Food::find($id);
        $food->id_supplier = "1";
        $food->name = $request->name;
        $food->price = $request->price;
        $food->num = $request->num;
        $food->image = $request->image;
        $food->unit = $request->unit;
        $food->note = $request->note;
        $food->save();

        return redirect()->route('foods.index')->with('success', 'Bạn đã cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $food = Food::find($id);
        $food->delete();
        return redirect()->route('foods.index')->with('success', 'Bạn đã xóa thành công');
}
}
