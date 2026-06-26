<?php

use App\Http\Controllers\Api\AuthController;

Route::prefix('admin')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'index');
    Route::post('/login', 'store')->name('login.check');
    Route::delete('/logout', 'logout')->name('logout');
});
