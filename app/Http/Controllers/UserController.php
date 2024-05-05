<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = \App\Models\User::all();
        return response()->json($user);
    }

    public function store(Request $request)
    {
        $user = new \App\Models\User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        return response()->json([
            'type' => 'success',
            'message' => 'User created successfully.'
        ]);
    }

    public function show($id)
    {
        $user = \App\Models\User::all();
        $data = $user->find($id);

        return response()->json($data);
    }
}
