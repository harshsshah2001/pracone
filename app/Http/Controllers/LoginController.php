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

    

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        return response()->json([
            'status' => true,
            'message' => 'Logout successful'
        ], 200);
    }
}
