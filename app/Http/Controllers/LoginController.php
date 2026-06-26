<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Register;
// use App\Repository\RegisterRepository;

use App\Services\RegisterService;

class LoginController extends Controller
{

    public function showLoginform()
    {
        return view('login.login');
    }

    public function apiLogin(Request $request)
    {
        $request->validate([

            'email' => 'required|email',

            'password' => 'required',
        ]);
        if (!Auth::guard('admin')->attempt($request->only('email', 'password'))) {

            return response()->json([
                'status' => false,
                'message' => 'Invalid credentials'
            ], 401);
        }

        $admin = Auth::guard('admin')->user();

        return response()->json([
            'status' => true,
            'message' => 'Login successful',
            'data' => $admin
        ], 200);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        return response()->json([
            'status' => true,
            'message' => 'Logout successful'
        ], 200);
    }
}
