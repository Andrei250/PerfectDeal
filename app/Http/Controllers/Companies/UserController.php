<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function renderMyOrders() {
        $orders = Auth::user()->orders()->paginate(10);

        return view('user.my_orders', ['orders' => $orders]);
    }
}
