<?php

use App\Http\Controllers\Companies\OrderController;
use App\Http\Controllers\Companies\OrderNegotiationController;
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

    Route::get('/account/my_negotiations', [UserController::class, 'renderMyNegotiations'])->middleware('company')->name('user.myNegotiations');

    Route::post('/account/refuse_request/{order_request}', [OrderRequestController::class, 'refuseRequest'])->middleware('company')->name('user.refuseRequest');

    Route::post('/account/refuse_negotiation/{order_negotiation}', [OrderNegotiationController::class, 'refuseNegotiation'])->middleware('company')->name('user.refuseNegotiation');

    Route::post('/account/accept_request/{order_request}', [OrderRequestController::class, 'acceptRequest'])->middleware('company')->name('user.acceptRequest');

    Route::post('/account/accept_negotiation/{order_negotiation}', [OrderNegotiationController::class, 'acceptNegotiation'])->middleware('company')->name('user.acceptNegotiation');
});
