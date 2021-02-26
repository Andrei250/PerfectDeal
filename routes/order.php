<?php

use App\Http\Controllers\Companies\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can declare routes for orders.
|
*/

Route::middleware(['auth', 'company'])->group(function () {
    Route::get('/company/orders', [OrderController::class, 'index'])->name('company.orders');

    Route::post('/company/add-new-product', [OrderController::class, 'addNewOrder'])->name('company.addNewOrder');
});
