<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');


use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'login'])->name('home.login');

Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'register'])->name('home.register');


use App\Http\Controllers\api\v1\AuthController as API;

Route::get('/get-location', [API::class, 'getLocation']);

Route::get('/check-email', [API::class, 'checkEmailAvailability']);

Route::get('/check-phone', [API::class, 'checkPhone']);



Route::post('/store', [AuthController::class, 'store'])->name('home.store');

Route::get('/profile',[AuthController::class, 'profile'])->name('home.profile');

Route::get('/forget_password',[AuthController::class, 'forget_password'])->name('home.forget_password');

Route::get('/reset_password', [AuthController::class, 'reset_password'])->name('home.reset_password');

Route::get('/role', [AuthController::class, 'role'])->name('home.role');