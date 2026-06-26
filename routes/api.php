<?php

use App\Http\Controllers\LoginController;

Route::prefix('admin')->controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginform');
    Route::post('/login', 'LoginData')->name('login.check');
    Route::delete('/logout', 'logout')->name('logout');
});
