<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function newsfeedFilters(Request $request): array
    {
        $orders = null;

        if (!isset($request['domain']) || is_null($request['domain']) || $request['domain'] == 'none') {
            $orders = Order::all();
        } else {
            $orders = Order::whereHas('domains', function($query) use ($request) {
               $query->where(['slug' => $request['domain']]);
            });

            if (isset($request['category']) && !is_null($request['category']) && $request['category'] != 'none') {
                $orders = $orders->whereHas('categories', function($query) use ($request) {
                    $query->where(['slug' => $request['category']]);
                });

                if (isset($request['subcategory']) && !is_null($request['subcategory']) && $request['subcategory'] != 'none') {
                    $orders = $orders->whereHas('subcategories', function($query) use ($request) {
                        $query->where(['slug' => $request['subcategory']]);
                    });
                }
            }

            $orders = $orders->get();
        }

        $ans[0][0] = '<p class="alert alert-warning mx-auto">Nu este nicio comanda cu filtere adaugate</p>';

        if (!is_null($orders)) {
            $counter = 0;
            foreach ($orders as $order) {
                $ans[$counter][0] = view('orders.order_component', ['order' => $order])->render();
                $ans[$counter][1] = view('orders.order_buy_modal', ['order' => $order])->render();
                $ans[$counter++][2] = view('orders.order_neg_modal', ['order' => $order])->render();
            }
        }
        return [$ans];
    }
}
