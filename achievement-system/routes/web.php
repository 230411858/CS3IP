<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\LogoutController;

use App\Http\Controllers\RegisterController;

Route::view('/', 'welcome')->name('welcome');

Route::view('/dashboard', 'dashboard')->name('dashboard')->middleware('auth');

Route::view('/login', 'login')->name('login')->middleware('guest');

Route::post('/login', LoginController::class)->name('login.attempt')->middleware('guest');

Route::view('/register', 'register')->name('register')->middleware('guest');

Route::post('/register', RegisterController::class)->name('register.attempt')->middleware('guest');

Route::post('/logout', LogoutController::class)->name('logout')->middleware('auth');