<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Register;

class LoginController extends Controller
{
    public function showLoginform()
    {
        return view('login.login');
    }

    public function LoginData(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('register')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('user.dashboard')->with('success', 'Login successful!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
