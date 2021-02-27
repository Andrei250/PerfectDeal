<?php

use App\Http\Controllers\Companies\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Orders Routes
|--------------------------------------------------------------------------
|
| Here is where you can declare routes for orders.
|
*/

Route::middleware(['auth', 'company'])->group(function () {
    Route::get('/company/orders', [OrderController::class, 'index'])->name('company.orders');

    Route::post('/company/add_new_order', [OrderController::class, 'addNewOrder'])->name('company.addNewOrder');

    Route::delete('/company/delete_order/{order}', [OrderController::class, 'deleteOrder'])->name('company.deleteOrder');
});
