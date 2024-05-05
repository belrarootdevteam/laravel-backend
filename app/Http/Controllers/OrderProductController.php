<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    public function index()
    {
        $order_product = \App\Models\OrderProduct::all();
        return response()->json($order_product);
    }

    public function store(Request $request)
    {
        $order_product = new \App\Models\OrderProduct();
        $order_product->quantity = $request->quantity;
        $order_product->price = $request->price;
        $order_product->total_price = $request->total_price;

        $order_product->save();

        return response()->json([
            'type' => 'success',
            'message' => 'Order Product created successfully!'
        ]);
    }

    public function show($id)
    {
        $order_product = \App\Models\OrderProduct::all();
        $order_product->find($id);

        return response()->json($order_product);
    }

    public function update(Request $request, $id)
    {
        $order_product = \App\Models\OrderProduct::all();
        $order_product->find($id)->update([
            'quantity' => $request->quantity,
            'price' => $request->price,
            'total_price' => $request->total_price
        ]);

        return response()->json([
            'type' => 'success',
            'message' => 'Order Product updated successfully!'
        ]);
    }
}
