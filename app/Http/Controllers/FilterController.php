<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function newsfeedFilters(Request $request) {
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

//        if (is_null()) {
//
//        }
        return [$orders];
    }
}
