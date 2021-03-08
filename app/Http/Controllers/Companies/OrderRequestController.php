<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderRequestController extends Controller
{
    public function makeOrderRequest(Request $request, Order $order): string
    {
        $quantity = $request['quantity'];
        $date = $request['date'];
        $pickupOption = $request['pickup-option'] == 'true';
        $pickupDate = $request['pickup-date'];

        if (is_null($quantity) || is_null($date)) {
            return '<p class="alert alert-danger">Campurile de cantitate si data de livrare sunt obligatorii.</p>';
        }

        if ($quantity < $order->getMinQuantity()) {
            return '<p class="alert alert-danger">Trebuie sa cumparati minim ' . $order->getMinQuantity() . ' unitati</p>';
        }

        if ($quantity > $order->getQuantity()) {
            return '<p class="alert alert-danger">Ati depasit cantiatea maxima. Puteti cumpara pana la ' . $order->getQuantity() . ' untiati</p>';
        }

        $orderRequest = new OrderRequest();
        $orderRequest->quantity = $quantity;
        $orderRequest->order_id = $order->id;
        $orderRequest->user_id = Auth::user()->id;
        $orderRequest->delivery_date = $date;
        $orderRequest->pickup_date = $pickupOption == true ? $pickupDate : null;
        $orderRequest->self_transport = is_null($orderRequest->pickup_date) ? false : $pickupOption;

        if (OrderRequest::checkHasRequest(Auth::user()->id, $order->id)) {
            return '<p class="alert alert-danger">Eroare. Deja ati aplicat pentru aceasta comanda</p>';
        }

        try {
            $orderRequest->save();
            return '<p class="alert alert-success">Cerere adaugata cu succes</p>';
        } catch (\Exception $e) {
            return '<p class="alert alert-danger">A avut loc o eroare. Daca persista, va rugam sa ne contactati.</p>';
        }
    }

    public function refuseRequest(Request $request, OrderRequest $order_request): string
    {
        $order_request->status = 'refused';

        try {
            $order_request->update();

            $notification = new Notification();

            $notification->description = "Comanda cu titlul " . $order_request->order->getTitle() . " a fost refuzata";
            $notification->user_id = $order_request->user->id;

            try {
                $notification->save();
                DB::table('order_request_notification')->insert([
                    ['order_request_id' => $order_request->id, 'notification_id' => $notification->id]
                ]);
            } catch (\Exception $e) {

            }

        } catch(\Exception $e) {
            return 'error';
        }

        return 'success';
    }

    public function acceptRequest(Request $request, OrderRequest $order_request): string
    {
        $order_request->status = 'accepted';
        $order = $order_request->order;

        try {
            $order->quantity = $order->quantity - intval($order_request->quantity);
            if ($order->quantity < $order->min_quantity) {
                $order->min_quantity = $order->quantity;
            }

            if ($order->quantity == 0) {
                $order->status = "Done";
            }

            try {
                $order->update();
            } catch(\Exception $exception) {
                return 'error';
            }

            $order_request->update();

            $notification = new Notification();

            $notification->description = "Comanda cu titlul " . $order_request->order->getTitle() . " a fost acceptata";
            $notification->user_id = $order_request->user->id;

            try {
                $notification->save();
                DB::table('order_request_notification')->insert([
                    ['order_request_id' => $order_request->id, 'notification_id' => $notification->id]
                ]);
            } catch (\Exception $e) {

            }
        } catch(\Exception $e) {
            return 'error';
        }

        return 'success';
    }
}
