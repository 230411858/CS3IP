<?php

use App\Http\Controllers\AdministratorController;

use App\Http\Controllers\TeacherController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\LogoutController;

use App\Http\Controllers\RegisterController;

use App\Http\Middleware\EnsureUserHasType;

use Illuminate\Support\Facades\Route;

use App\UserType;

// Unauthenticated routes
Route::middleware('guest')->group(function()
{
    Route::view('/', 'welcome')->name('welcome');

    Route::view('/login', 'login')->name('login');

    Route::post('/login', LoginController::class)->name('login.attempt');

    Route::view('/register', 'register')->name('register');

    Route::post('/register', RegisterController::class)->name('register.attempt');
});

// Authenticated routes
Route::middleware('auth')->group(function()
{
    Route::post('/logout', LogoutController::class)->name('logout');

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::view('/settings', 'settings')->name('settings');

    // Admin routes
    Route::middleware(EnsureUserHasType::class.':'.UserType::Administrator->value)->group(function()
    {
        Route::view('/admin/users', [UserController::class, 'show'])->name('user.show');

        Route::view('/admin/user/{id}', [UserController::class, 'show'])->name('user.show');

        Route::post('/admin/user/{id}/update/email', [UserController::class, 'updateEmail'])->name('update.email');

        Route::post('/admin/user/{id}/update/password', [UserController::class, 'updatePassword'])->name('update.password');

        Route::get('/edit/{id}', [AdministratorController::class, 'showEdit'])->name('admin.edit');

        Route::post('/edit', [AdministratorController::class, 'edit'])->name('edit.attempt');
    });

    // Teacher routes
    Route::middleware(EnsureUserHasType::class.':'.UserType::Teacher->value)->group(function()
    {
        Route::get('/award/{id}', [TeacherController::class, 'showAward'])->name('teacher.award');

        Route::post('/award', [TeacherController::class, 'award'])->name('award.attempt');
    });

});