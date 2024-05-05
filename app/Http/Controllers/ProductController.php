<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = \App\Models\Product::all();
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $product = new \App\Models\Product();
        $product->name_th = $request->name_th;
        $product->name_en = $request->name_en;
        $product->price = $request->price;
        $product->unit = $request->unit;
        $product->product_size = $request->product_size;
        $product->product_img = $request->file('product_img')->storeAs('uploads/img/product');

        $product->save();

        return response()->json([
            'type' => 'success',
            'message' => 'Product created successfully!'
        ]);
    }

    public function show($id)
    {
        $product = \App\Models\Product::all();
        $product->find($id);

        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $product = \App\Models\Product::all();
        $product->find($id)->update([
            'name_th' => $request->name_th,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'unit' => $request->unit,
            'product_size' => $request->product_size,
            'product_img' => $request->file('product_img')->storeAs('uploads/img/product'),
            'status' => $request->status
        ]);

        return response()->json([
            'type' => 'success',
            'message' => 'Product updated successfully!'
        ]);
    }
}
