<?php

use App\Http\Controllers\RoleController;

Route::get('/admin/roles', [RoleController::class, 'index'])->name('roles.index');
Route::post('/admin/roles', [RoleController::class, 'store'])->name('roles.store');
Route::get('/admin/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('/admin/roles/{role}/update', [RoleController::class, 'update'])->name('roles.update');
Route::delete('/admin/roles/{role}/delete', [RoleController::class, 'destroy'])->name('roles.destroy');
