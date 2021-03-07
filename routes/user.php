<?php

use App\Http\Controllers\Companies\OrderController;
use App\Http\Controllers\Companies\OrderRequestController;
use App\Http\Controllers\Companies\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can declare routes for users.
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/account/my_orders', [UserController::class, 'renderMyOrders'])->middleware('company')->name('user.myOrders');

    Route::get('/account/my_requests', [UserController::class, 'renderMyRequests'])->middleware('company')->name('user.myRequests');

    Route::post('/account/refuse_request/{order_request}', [OrderRequestController::class, 'refuseRequest'])->middleware('company')->name('user.refuseRequest');
});
