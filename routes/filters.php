<?php

use App\Http\Controllers\FilterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can declare routes for filters.
|
*/


Route::middleware(['auth', 'company'])->group(function () {
    Route::post('/applyFilters', [FilterController::class, 'newsfeedFilters'])->name('newsfeed.applyFilters');
});
