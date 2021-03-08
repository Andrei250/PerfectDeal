<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderRequest extends Model
{
    use HasFactory;

    protected $table = "order_requests";
    protected $fillable = ["quantity", "delivery_date", "self_transport", "pickup_date", "user_id", "order_id"];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function order(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public static function checkHasRequest($user_id, $order_id): bool
    {
        return count(OrderRequest::where(['order_id' => $order_id, 'user_id' => $user_id])->get()) != 0;
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    public function getDeliveryDate(): string
    {
        if (isset($this->delivery_date) && !is_null($this->delivery_date)) {
            return date("d M Y", strtotime($this->delivery_date));
        }

        return 'Eroare: Acest request nu are data de livrare.';
    }

    public function getPickupDate(): string
    {
        if (isset($this->pickup_date) && !is_null($this->pickup_date)) {
            return date("d M Y", strtotime($this->pickup_date));
        }

        return 'Fara data de pickup.';
    }

    public function getSelfTransport(): bool
    {
        if (!is_null($this->self_transport)) {
            return $this->self_transport;
        }

        return false;
    }
}
