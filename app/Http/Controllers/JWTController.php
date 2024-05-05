<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

// JWT Authentication
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTController extends Controller
{
    public function issue(Request $request)
    {
        $key = 'key';
        $payload = [
            'iss' => config('app.url'),
            'aud' => config('app.url'),
            'iat' => now()->getTimestamp(),
            'role' => Auth::user()['is_admin'] ? 'admin' : 'user',
            'exp' => now()->addMinutes(60)->timestamp
        ];

        $jwt = JWT::encode($payload, $key, 'HS256');
        return response()->json(['token' => $jwt]);
    }

    public function verify(Request $request)
    {
        $key = 'key';
        $token = $request->token;

        try {
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            return response()->json($decoded);
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 401);
        }
    }
}
