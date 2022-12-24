<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "THỨC ĂN";
        $foods = Food::all();
        return view('admin.foods.food-list', compact('foods', 'title'));
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
        $foods = new Food();
        $foods->id_role = 2;  //level=1: admin; level=2:kỹ thuật; level=3: khách hàng
        $foods->name = $request->name;
        $foods->email = $request->email;
        // $foods->password = Hash::make($request->password);
        $foods->phone = $request->phone;
        $foods->address = $request->address;
        $foods->save();
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
        $foods = Food::firstWhere('id', $id);
        return view('admin.foods.food-edit', compact('title', 'foods'));
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
        $foods = Food::find($id);
        $foods->id_role = $request->id_role;  //level=1: admin; level=2:kỹ thuật; level=3: khách hàng
        $foods->name = $request->name;
        $foods->email = $request->email;
        // $foods->password = Hash::make($request->password);
        $foods->phone = $request->phone;
        $foods->address = $request->address;
        $foods->save();

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
         $foods = Food::find($id);
        $foods->delete();
        return redirect()->route('foods.index')->with('success', 'Bạn đã xóa thành công');
}
}
