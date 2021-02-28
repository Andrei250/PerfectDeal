<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Order;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index() {
//        $orders = Order::where(['status' => 'Available'])->orderBy('created_at', 'DESC')->paginate(10);
        $domains = Domain::all();

        return view('orders.newsfeed', ['domains' => $domains]);
    }

    public function addNewOrder(Request $request): RedirectResponse
    {
        $this->validateRequest($request, 'title', 'description', 'quantity', 'min_quantity', 'expire_date', 'price');

        $order = new Order();

        $this->saveAndRedirect($request, $order, 'title', 'description', 'quantity', 'min_quantity', 'expire_date', 'price', 'icon');

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

    /**
     * @param Order $order
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function modifyOrder(Order $order, Request $request) {
        if (Auth::user()->id != $order->user_id) {
            return redirect('home');
        }

        $this->validateRequest($request, 'title-order', 'description-order', 'quantity-order', 'min_quantity-order', 'expire_date-order', 'price-order');

        $this->saveAndRedirect($request, $order, 'title-order', 'description-order', 'quantity-order', 'min_quantity-order', 'expire_date-order', 'price-order', 'icon-order');

        try {
            $order->update();
        } catch (Exception $e) {
            return redirect('home')->with('error', 'A aparut o eroare');
        }

        return redirect('home')->with('success', "Comanda modificata cu succes");

    }

    public function showOrder(Order $order) {
        if (Auth::user()->id != $order->user_id) {
            return redirect('home');
        }

        return view('orders.modify_order', ['order' => $order]);
    }

    /**
     * @param Request $request
     * @param $title
     * @param $description
     * @param $quantity
     * @param $min_quantity
     * @param $expire_date
     * @param $price
     * @return array
     */
    private function validateRequest(Request $request,
                                     $title,
                                     $description,
                                     $quantity,
                                     $min_quantity,
                                     $expire_date,
                                     $price): array
    {
        return $request->validate([
            $title => 'required',
            $description => 'required',
            $quantity => 'required',
            $min_quantity => 'required|lte:' . $quantity,
            $expire_date => 'required|date|after:yesterday',
            $price => 'required'
        ]);
    }

    private function  saveAndRedirect(Request $request, Order $order,
                                      $title,
                                      $description,
                                      $quantity,
                                      $min_quantity,
                                      $expire_date,
                                      $price,
                                      $icon)
    {
        $order->builder($request->get($title),
            $request->get($description),
            $request->get($quantity),
            $request->get($min_quantity),
            $request->get($expire_date),
            $request->get($price));

        if ($request->hasFile($icon)) {
            $path = $request[$icon]->store('public/uploads/orders');
            $order->img_path = str_replace("public/", "", $path);
        }
    }


}
