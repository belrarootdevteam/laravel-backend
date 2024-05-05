<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = \App\Models\Category::all();
        return response()->json($category);
    }

    public function store(Request $request)
    {
        $category = new \App\Models\Category();
        $category->name = $request->name;
        $category->status = $request->status;

        $category->save();

        return response()->json([
            'type' => 'success',
            'message' => 'Category created successfully!'
        ]);
    }

    public function show($id)
    {
        $category = \App\Models\Category::all();
        $category->find($id);

        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $category = \App\Models\Category::all();
        $category->find($id)->update([
            'name' => $request->name,
            'status' => $request->status
        ]);

        return response()->json([
            'type' => 'success',
            'message' => 'Category updated successfully!'
        ]);
    }
}
