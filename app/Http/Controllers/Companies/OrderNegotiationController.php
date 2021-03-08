<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderNegotiation;
use App\Models\OrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function refuseNegotiation(Request $request, OrderNegotiation $order_negotiation): string
    {
        $order_negotiation->status = 'refused';

        try {
            $order_negotiation->update();

            $notification = new Notification();

            $notification->description = "Oferta cu titlul " . $order_negotiation->order->getTitle() . " a fost refuzata";
            $notification->user_id = $order_negotiation->user->id;

            try {
                $notification->save();
                DB::table('order_negotiation_notification')->insert([
                    ['order_negotiation_id' => $order_negotiation->id, 'notification_id' => $notification->id]
                ]);
            } catch (\Exception $e) {

            }

        } catch(\Exception $e) {
            return 'error';
        }

        return 'success';
    }

    public function acceptNegotiation(Request $request, OrderNegotiation $order_negotiation): string
    {
        $order_negotiation->status = 'refused';

        try {
            $order_negotiation->update();

            $notification = new Notification();

            $notification->description = "Oferta cu titlul " . $order_negotiation->order->getTitle() . " a fost acceptata";
            $notification->user_id = $order_negotiation->user->id;

            try {
                $notification->save();
                DB::table('order_negotiation_notification')->insert([
                    ['order_negotiation_id' => $order_negotiation->id, 'notification_id' => $notification->id]
                ]);
            } catch (\Exception $e) {

            }

        } catch(\Exception $e) {
            return 'error';
        }

        return 'success';
    }
}
