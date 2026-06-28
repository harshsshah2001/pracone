<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{

    public function showAdminHome(Request $request){
        return response()->json([
            'status'=>TRUE,
            'message'=>'Admin Home',
            'user'=>$request->user(),
            'amount'=>1000
        ]);
    }

    public function addCategories(){

    }
}
