<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'index');
    Route::post('/login', 'store')->name('login.check');
});

Route::middleware('auth:sanctum')->delete('admin/logout',[AuthController::class,'logout']);

Route::middleware('auth:sanctum')->prefix('admin')->controller(AdminController::class)->group(function () {

    Route::get('/dashboard','showAdminHome');
    

});

Route::middleware('auth:sanctum')->prefix('admin')->group(function(){
        Route::post('/categories',[CategoryController::class,'store']);
});
