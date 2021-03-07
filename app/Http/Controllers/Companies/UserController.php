<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\OrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function renderMyOrders() {
        $orders = Auth::user()->orders()->orderBy('created_at', 'DESC')->paginate(10);

        return view('user.my_orders', ['orders' => $orders]);
    }

    public function renderMyRequests() {
        $requests = Auth::user()->selfOrderRequests->filter(function ($item) {
            return $item->status == 'opened';
        })->values();

        return view('user.my_requests', ['requests' => $requests]);
    }
}
