<?php

namespace App\Http\Controllers;

use AdminService as GlobalAdminService;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Services\admin\AdminService;

class AdminController extends Controller
{
    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }




    public function showAdminHome(Request $request)
    {
        return response()->json([
            'status' => TRUE,
            'message' => 'Admin Home',
            'user' => $request->user(),
            'amount' => 1000
        ]);
    }

    public function addCategories() {}
}
