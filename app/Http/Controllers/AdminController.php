<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showAdminLoginForm()
    {
        return view('admin.login');
    }

    public function AdminLoginData(Request $request){
        $credentials = $request->only('email', 'password');

        if(auth()->guard('admin')->attempt($credentials)){
            session()->flash('success', 'Admin login successful!');
            return redirect()->route('admin.dashboard');
        }

        session()->flash('error', 'Invalid credentials');
        return redirect()->back();
    }
}
