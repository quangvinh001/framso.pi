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
        $product = Product::whereDate('created_at', [$startDate, $endDate]) -> get();
        $total = Product::sum('num');
        return view('admin.product-list', compact('product', 'title', 'date', 'total','key'));
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
      

        $product = new Product();
        $product->id_typeproduct = $request->id_typeproduct; 
        $product->name = $request->name;
        $product->num = $request->num;
        $product->unit = $request->unit;
        $product->image = $request->image_file;
        $product->note = $request->note;
        $product->save();
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
        $product = Product::firstWhere('id', $id);
        return view('admin.product-edit', compact('title', 'product'));
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
        $product = Product::find($id);
        $product->id_typeproduct = $request->id_typeproduct; 
        $product->name = $request->name;
        $product->num = $request->num;
        $product->unit = $request->unit;
        $product->image = $request->image_file;
        $product->note = $request->note;
        $product->save();
        
        return redirect()->route('products.index')->with('success', 'Bạn đã cập nhật thành công');
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
