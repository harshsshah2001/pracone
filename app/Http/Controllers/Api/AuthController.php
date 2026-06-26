<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (!Auth::guard('admin')->attempt($request->only('email', 'password'))) {

                return response()->json([
                    'status' => false,
                    'message' => 'Invalid Credentials'
                ], 401);
            }

            /** @var Register $admin */
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


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function logout(Request $request)
    {
        // return $this->registerService->logout($request);
    }
}
