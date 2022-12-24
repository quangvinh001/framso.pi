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
        $pets = Pet::all();
        // dd($bills);
        return view('admin.pets.pet-list', compact('pets', 'title'));
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
        $pets = new Pet();
        $pets->id_typepet = $request->id_typepet;
        $pets->name = $request->name;
        $pets->num = $request->num;
        $pets->gender = $request->gender;
        $pets->unit = $request->unit;
        $pets->image = $request->image;
        $pets->note = $request->note;
        $pets->save();
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
        $pets = pet::find($id);
        $pets->id_typepet = $request->id_typepet;
        $pets->name = $request->name;
        $pets->num = $request->num;
        $pets->gender = $request->gender;
        $pets->unit = $request->unit;
        $pets->image = $request->image;
        $pets->note = $request->note;
        $pets->save();

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
