<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::where(['status' => 'Available'])->orderBy('created_at', 'DESC')->paginate(10);

        return view('orders.newsfeed', ['orders' => $orders]);
    }

    public function addNewOrder(Request $request): RedirectResponse
    {
        $this->validateRequest($request);

        $order = new Order();

        $order->builder($request->get('title'),
            $request->get('description'),
            $request->get('quantity'),
            $request->get('min_quantity'),
            $request->get('expire_date'),
            $request->get('price'));

        if ($request->hasFile('icon')) {
            $path = $request['icon']->store('public/uploads/orders');
            $order->img_path = str_replace("public/", "", $path);
        }

        try {
            $order->save();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'A aparut o eroare');
        }

        return redirect()->back()->with('success', 'Comanda adaugata cu succes!');
    }

    public function deleteOrder(Order $order): RedirectResponse
    {
        try {
            $order->delete();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'A aparut o eroare');
        }

        return redirect()->back()->with('success', 'Comanda stearsa cu succes!');
    }

    public function modifyOrder(Order $order) {
        if (Auth::user()->id != $order->user_id) {
            return redirect('home');
        }

    }

    public function showOrder(Order $order) {
        if (Auth::user()->id != $order->user_id) {
            return redirect('home');
        }

        return view('orders.modify_order', ['order' => $order]);
    }

    private function validateRequest(Request $request): array
    {
        return $request->validate([
            'title' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'min_quantity' => 'required|lte:quantity',
            'expire_date' => 'required|date|after:yesterday',
            'price' => 'required'
        ]);
    }

}
