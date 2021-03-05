<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Domain\DomainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can declare routes for admin part.
|
*/


Route::middleware(['auth', 'company'])->group(function () {
    Route::post('/domains/{domain:slug}/getCategories', [DomainController::class, 'getCategories'])->name('domain.getCategories');
});
