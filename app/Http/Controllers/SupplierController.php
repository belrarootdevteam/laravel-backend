<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = \App\Models\Supplier::all();
        return response()->json($supplier);
    }

    public function store(Request $request)
    {
        $supplier = new \App\Models\Supplier();
        $supplier->name = $request->name;
        $supplier->phone = $request->phone;
        $supplier->tax_number = $request->tax_number;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->user_id = auth()->id();

        $supplier->save();

        return response()->json([
            'type' => 'success',
            'message' => 'Supplier created successfully!'
        ]);
    }

    public function show($id)
    {
        $supplier = \App\Models\Supplier::all();
        $supplier->find($id);

        return response()->json($supplier);
    }

    public function update(Request $request, $id)
    {
        $supplier = \App\Models\Supplier::all();
        $supplier->find($id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'tax_number' => $request->tax_number,
            'email' => $request->email,
            'address' => $request->address
        ]);

        return response()->json([
            'type' => 'success',
            'message' => 'Supplier updated successfully!'
        ]);
    }
}
