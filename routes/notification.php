<?php

use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Orders Routes
|--------------------------------------------------------------------------
|
| Here is where you can declare routes for notifications.
|
*/

Route::middleware(['auth'])->group(function () {
    Route::post('/get_notifications', [NotificationController::class, 'getNotifications'])->name('user.getNotifications');
});
