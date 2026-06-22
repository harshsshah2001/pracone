<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function showAdminLoginForm()
    {
        return view('admin.login');
    }

    public function showAdminDashboard()
    {
        return view('admin.dashboard');
    }

    public function AdminLoginData(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->guard('admin')->attempt($credentials)) {
            session()->flash('success', 'Admin login successful!');
            return redirect()->route('admin.dashboard');
        }

        session()->flash('error', 'Invalid credentials');
        return redirect()->back();
    }

    public function showForgotPasswordForm()
    {
        return view('admin.forgot-password');
    }

    public function AdminForgotPasswordData(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if (!$admin) {
            return redirect()->back()->withErrors(['email' => 'Email not found']);
        }

        $password = now()->format('YmdHis') . Str::upper(Str::random(10));

        $admin->forgot_password = $password;
        $admin->save();

        Mail::raw(
            "Your Mail Password Is : " . $password,
            function ($message) use ($admin) {
                $message->to($admin->email)
                    ->subject('Forgot Password');
            }
        );

        return redirect()->route('admin.change.password.form');
    }

    public function AdminChangePasswordform()
    {

        return view('admin.change-password');
    }

    public function AdminChangePasswordData(Request $request)
    {
        $admin = Admin::where(
            'forgot_password',
            $request->mail_password
        )->first();

        if (!$admin) {
            return back()->with(
                'error',
                'Invalid Mail Password'
            );
        }

        return redirect()->route('user.dashboard');
    }
}
