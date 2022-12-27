<?php

namespace App\Http\Controllers;

use App\Models\Product;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $key = "1";
        $date = $request -> query('date', (new DateTime())->format('Y-m-d'));
        $startDate = Carbon::createFromFormat('Y-m-d', $date)->startOfDay();
        $endDate = Carbon::createFromFormat('Y-m-d', $date)->endOfDay();
        $title = "SẢN PHẨM";
        $products = Product::whereDate('created_at', [$startDate, $endDate]) -> get();
        $total = Product::sum('num');
        return view('admin.product-list', compact('products', 'title', 'date', 'total','key'));
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
        $products = new Product();
        $products->id_typeproduct = $request->id_typeproduct; 
        $products->name = $request->name;
        $products->price = $request->price;
        $products->num = $request->num;
        $products->unit = $request->unit;
        $products->image = $request->image;
        $products->note = $request->note;
        $products->save();
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
        $title = "SẢN PHẨM";
        $products = Product::firstWhere('id', $id);
        return view('admin.product-edit', compact('title', 'products'));
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
        $products = Product::find($id);
        $products->id_typeproduct = $request->id_typeproduct; 
        $products->name = $request->name;
        $products->price = $request->price;
        $products->num = $request->num;
        $products->unit = $request->unit;
        $products->image = $request->image;
        $products->note = $request->note;
        $products->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();
        return redirect()->route('products.index')->with('success', 'Bạn đã xóa thành công');
    }
}
