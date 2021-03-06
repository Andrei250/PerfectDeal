<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderNegotiation;
use App\Models\OrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderNegotiationController extends Controller
{
    public function makeOrderNegotiation(Request $request, Order $order): string
    {
        $description = $request['description'];

        if (is_null($description)) {
            return '<p class="alert alert-danger"> Camp obligatoriu</p>';
        }

        $orderNeg = new OrderNegotiation();
        $orderNeg->user_id = Auth::user()->id;
        $orderNeg->order_id = $order->id;
        $orderNeg->description = $description;

        try {
            $orderNeg->save();
            return '<p class="alert alert-success">Cerere adaugata cu succes</p>';
        } catch (\Exception $e) {
            return '<p class="alert alert-danger">A avut loc o eroare. Daca persista, va rugam sa ne contactati.</p>';
        }
    }
}
