<?php

namespace App\Services;

use App\Models\Payment;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Register;
use App\Models\Registration_Images;
use App\Repository\RegisterRepository;
use Illuminate\Support\Facades\Hash;

class RegisterService
{
    protected $registerRepository;
    public function __construct(RegisterRepository $registerRepository)
    {
        $this->registerRepository = $registerRepository;
    }

    public function showData(){
      return $this->registerRepository->showData();
    }

    public function registerData($request){
        return $this->registerRepository->create($request);
    }

    public function deleteData($id){
        return $this->registerRepository->deleteData($id);
    }
}