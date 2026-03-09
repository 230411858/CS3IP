<?php

use App\Http\Controllers\UserController;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\LogoutController;

use App\Http\Controllers\RegisterController;

use App\Http\Controllers\AdministratorController;

use App\Http\Controllers\TeacherController;

use App\Http\Controllers\GuardianController;

use App\Http\Controllers\StudentController;

use App\Http\Middleware\EnsureUserHasType;

use Illuminate\Support\Facades\Route;

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

    // Administrator routes
    Route::middleware(EnsureUserHasType::class.':administrator')->group(function()
    {
        Route::get('/edit/{id}', [AdministratorController::class, 'showEdit'])->name('administrator.edit');

        Route::post('/edit', [AdministratorController::class, 'edit'])->name('administrator.edit.attempt');
    });

    // Teacher routes
    Route::middleware(EnsureUserHasType::class.':teacher')->group(function()
    {
        Route::get('/award/{id}', [TeacherController::class, 'showAward'])->name('teacher.award');

        Route::post('/award', [TeacherController::class, 'award'])->name('teacher.award.attempt');
    });

    // Guardian routes
    Route::middleware(EnsureUserHasType::class.':guardian')->group(function()
    {
        Route::get('/view/student/{id}', [GuardianController::class, 'view'])->name('guardian.view');

        Route::view('/add', 'guardian.add')->name('guardian.add');

        Route::post('/add', [GuardianController::class, 'add'])->name('guardian.add.attempt');
    });

    // Student routes
    Route::middleware(EnsureUserHasType::class.':student')->group(function()
    {
        Route::get('/view/{type}', [StudentController::class, 'viewAchievement'])->name('student.view');
    });

});