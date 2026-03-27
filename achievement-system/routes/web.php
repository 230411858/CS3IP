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
    Route::get('/logout', LogoutController::class)->name('logout');

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::view('/settings', 'settings')->name('settings');

    Route::post('/update/email', [UserController::class, 'updateEmail'])->name('user.update.email.attempt');

    Route::post('/update/password', [UserController::class, 'updatePassword'])->name('user.update.password.attempt');

    // Administrator routes
    Route::middleware(EnsureUserHasType::class.':administrator')->group(function()
    {
        Route::get('/administrator/dashboard', [AdministratorController::class, 'dashboard'])->name('administrator.dashboard');

        Route::get('/administrator/edit/{id}', [AdministratorController::class, 'showEdit'])->name('administrator.edit');

        Route::post('/administrator/edit', [AdministratorController::class, 'edit'])->name('administrator.edit.attempt');
    });

    // Teacher routes
    Route::middleware(EnsureUserHasType::class.':teacher')->group(function()
    {
        Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');

        Route::get('/award', [TeacherController::class, 'showAward'])->name('teacher.award');

        Route::post('/award', [TeacherController::class, 'award'])->name('teacher.award.attempt');
    });

    // Guardian routes
    Route::middleware(EnsureUserHasType::class.':guardian')->group(function()
    {
        Route::get('/guardian/dashboard', [GuardianController::class, 'dashboard'])->name('guardian.dashboard');

        Route::get('/guardian/view/student/{id}', [GuardianController::class, 'view'])->name('guardian.view');

        Route::view('/guardian/add', 'guardian.add')->name('guardian.add');

        Route::post('/guardian/add', [GuardianController::class, 'add'])->name('guardian.add.attempt');
    });

    // Student routes
    Route::middleware(EnsureUserHasType::class.':student')->group(function()
    {
        Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');

        Route::get('/student/achievement/{type}', [StudentController::class, 'achievements'])->name('student.achievements');

        Route::get('/student/friend/achievement/{id}/{type}', [StudentController::class, 'friendsAchievements'])->name('student.friend.achievements');

        Route::post('/student/friend/add', [StudentController::class, 'sendFriendRequest'])->name('student.friend.request');

        Route::post('/student/friend/accept', [StudentController::class, 'acceptFriendRequest'])->name('student.friend.accept');

        Route::post('/student/friend/cancel', [StudentController::class, 'cancelOrRejectFriendRequestOrRemoveFriend'])->name('student.friend.cancel');

        Route::post('/student/friend/reject', [StudentController::class, 'cancelOrRejectFriendRequestOrRemoveFriend'])->name('student.friend.reject');

        Route::post('/student/friend/remove', [StudentController::class, 'cancelOrRejectFriendRequestOrRemoveFriend'])->name('student.friend.remove');
    });

});