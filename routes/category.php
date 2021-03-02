<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Category\CategoryController;
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
    Route::post('/category/{category:slug}/getSubcategories', [CategoryController::class, 'getSubcategories'])->name('category.getSubcategories');
});
