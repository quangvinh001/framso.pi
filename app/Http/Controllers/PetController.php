<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "VẬT NUÔI";
        $pet= Pet::all();
        // dd($bills);
        return view('admin.pets.pet-list', compact('pet', 'title'));
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
        //
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
        return view('admin.pets.pet-edit', [
            'pet' => Pet::firstWhere('id', $id),
            'title' => "Vật Nuôi"
        ]);
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
        $pet = pet::find($id);
        $pet->id_role = $request->id_role;  //level=1: admin; level=2:kỹ thuật; level=3: khách hàng
        $pet->name = $request->name;
        $pet->email = $request->email;
        $pet->password = Hash::make($request->password);
        $pet->phone = $request->phone;
        $pet->address = $request->address;
        $pet->save();

        return redirect()->route('pets.index')->with('success', 'Bạn đã cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pets = Pet::find($id);
        $pets->delete();
        return redirect()->route('pets.index')->with('success', 'Bạn đã xóa thành công');
    }
}
