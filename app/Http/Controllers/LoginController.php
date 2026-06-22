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
    protected $registerService;
    public function __construct(RegisterService $registerService){
        $this->registerService = $registerService;
    }
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

        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('user.dashboard')->with('success', 'Login successful!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        return $this->registerService->logout($request);
    }
}
