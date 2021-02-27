<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        return view('orders.orders');
    }

    public function addNewOrder(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'min_quantity' => 'required|lte:quantity',
            'expire_date' => 'required|date|after:yesterday',
        ]);

        $order = new Order();

        $order->builder($request->get('title'),
            $request->get('description'),
            $request->get('quantity'),
            $request->get('min_quantity'),
            $request->get('expire_date'));

        if ($request->hasFile('icon')) {
            $path = $request['icon']->store('public/uploads/orders');
            $order->img_path = str_replace("public/", "", $path);
        }

        try {
            $order->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'A aparut o eroare');
        }

        return redirect()->back()->with('success', 'Utilizator sters cu succes!');
    }
}
