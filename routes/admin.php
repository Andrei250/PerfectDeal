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

Route::get('/admin/panel', [AdminController::class, 'index'])->middleware('admin')->name('admin.panel');
