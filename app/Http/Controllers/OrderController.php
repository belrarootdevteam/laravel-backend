<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $order = \App\Models\Order::all();
        return response()->json($order);
    }

    public function store(Request $request)
    {
        $order = new \App\Models\Order();
        $order->quantity = $request->quantity;
        $order->price = $request->price;
        $order->total_price = $request->total_price;
        $order->status = $request->status;
        $order->address = $request->address;
        $order->slip_img = $request->file('slip_img')->storeAs('uploads/img/slip');
        $order->user_id = auth()->id();

        $order->save();

        return response()->json([
            'type' => 'success',
            'message' => 'Order created successfully!'
        ]);
    }

    public function show($id)
    {
        $order = \App\Models\Order::all();
        $order->find($id);

        return response()->json($order);
    }

    public function update(Request $request, $id)
    {
        $order = \App\Models\Order::all();
        $order->find($id)->update([
            'quantity' => $request->quantity,
            'price' => $request->price,
            'total_price' => $request->total_price,
            'status' => $request->status,
            'address' => $request->address,
            'slip_img' => $request->file('slip_img')->storeAs('uploads/img/slip')
        ]);

        return response()->json([
            'type' => 'success',
            'message' => 'Order updated successfully!'
        ]);
    }
}
