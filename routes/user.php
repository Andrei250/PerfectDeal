<?php

use App\Http\Controllers\Companies\OrderController;
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
});
