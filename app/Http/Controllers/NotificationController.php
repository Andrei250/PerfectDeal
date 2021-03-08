<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function getNotifications(): array
    {

        try {
            $notifications = Auth::user()->notifications;
            $ans = [];

            if (count($notifications) > 0 ) {
                for ($i = 0; $i < min(count($notifications), 3); ++$i) {
                    $ans[$i] = '<p class="dropdown-item">' . $notifications[$i]->description . '</p>';
                }
            } else {
                $ans = ['<p class="dropdown-item p-0"> Nu aveti nicio notificare</p>'];
            }

            return ['success', $ans];
        } catch (\Exception $e) {
            return ['error'];
        }
    }
}
