<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/form', 'form');
    Route::post('/submit', 'submitform')->name('form.submit');
    Route::post('/payment/store', 'storePayment')->name('payment.store');
});

Route::controller(RegisterController::class)->group(function(){
    Route::get('/register','showRegistrationForm');
    Route::post('/register','registerData')->name('register.store');
    Route::delete('/register/{id}','deleteData')->name('register.delete');
    Route::get('/register/{id}/edit','editData')->name('register.edit');
    Route::put('/register/{id}','updateData')->name('register.update');
});
