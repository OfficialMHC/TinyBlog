<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::put('admin/users/{user}/update', [UserController::class, 'update'])->name('user.profile.update');
    Route::delete('admin/users/{user}/delete', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::middleware(['role:admin', 'auth'])->group(function () {
    Route::get('admin/users', [UserController::class, 'index'])->name('users.index');
});

// This is using UserPolicy so that's why the specific user or the admin can access and update their profile.
Route::middleware(['can:view,user'])->group(function () {
    Route::get('admin/users/{user}/profile', [UserController::class, 'show'])->name('user.profile.show');
});
