<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/order.php';
require __DIR__.'/user.php';
require __DIR__.'/domain.php';
require __DIR__.'/category.php';
require __DIR__.'/subcategory.php';
require __DIR__.'/filters.php';
require __DIR__.'/notification.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
