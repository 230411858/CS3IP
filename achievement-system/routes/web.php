<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

// User added
Route::view('/dashboard', 'dashboard')->name('dashboard')->middleware('auth');

Route::view('/login', 'login')->name('login');

Route::post('/login', LoginController::class)->name('login.attempt');

Route::view('/register', 'register')->name('register');

Route::post('/register', RegisterController::class)->name('register.attempt');

Route::post('/logout', LogoutController::class)->name('logout');