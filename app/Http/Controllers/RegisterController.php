<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Services\RegisterService;

class RegisterController extends Controller
{
    protected $registerService;
    public function __construct(RegisterService $registerService){
        $this->registerService = $registerService;
    }

    public function showRegistrationForm(){
       $data = $this->registerService->showData();
        return view('register.register',['data'=>$data]);
    }

    public function registerData(RegisterRequest $request){
        $this->registerService->registerData($request);
        return redirect()->back()->with('success','Registration successful!');
    }

    public function deleteData($id){
       $this->registerService->deleteData($id);
        return redirect()->back()->with('success','Data deleted successfully!');
    }
}
