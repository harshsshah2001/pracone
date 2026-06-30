<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Services\Admin\AdminService;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function showAdminHome(Request $request)
    {
        $admin = $request->user();

        return response()->json([
            'status' => TRUE,
            'message' => 'Admin Home',
            'user' => $admin,
            'password' => $admin->password,
            'amount' => 1000
        ]);
    }

    public function addCategories() {}
}
