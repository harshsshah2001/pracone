<?php

namespace App\Http\Controllers\Api;

use App\Services\admin\AdminService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\AdminRequest;

class AuthController extends Controller
{
    protected $adminService;
    public function __construct(AdminService $adminService){

        $this->adminService = $adminService;
    }

    public function index()
    {
        return view('login.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        return $this->adminService->store($request);
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
        $user = $request->user();
        $token = $user->currentAccessToken();
        $user->currentAccessToken()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Logout Successful',
            'id' => $user->id,
            'token' => $token
        ]);
    }
}
