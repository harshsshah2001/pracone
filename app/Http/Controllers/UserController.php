<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function form()
    {
        return $this->userService->showform();
    }

    public function submitform(Request $request)
    {
        return $this->userService->submitform($request);
    }

    public function storePayment(Request $request)
    {
        return $this->userService->storePayment($request);
    }
}
