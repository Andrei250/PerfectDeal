<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can declare routes for admin part.
|
*/


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/panel', [AdminController::class, 'index'])->name('admin.panel');

    Route::delete('/admin/panel/delete/{user:name}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
});
