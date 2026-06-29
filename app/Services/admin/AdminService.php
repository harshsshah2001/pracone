<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminService
{
    public function store(Request $request)
    {
    

        if (!Auth::guard('admin')->attempt($request->only('email', 'password'))) {

            return response()->json([
                'status' => false,
                'message' => 'Invalid Credentials'
            ], 401);
        }

        /** @var \App\Models\Register $admin */
        $admin = Auth::guard('admin')->user();

        $token = $admin->createToken('Admin Token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Login Successful',
            'token' => $token,
            'admin' => $admin
        ]);
    }
}
