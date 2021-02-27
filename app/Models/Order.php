<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'quantity',
        'expire_date',
        'status',
        'min_quantity',
        'user_id',
        'img_path'
    ];

    protected $table = 'orders';

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function builder($title, $description, $quantity, $min_quantity, $expire_date) {
        $this->title = $title;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->min_quantity = $min_quantity;
        $this->expire_date = $expire_date;
        $this->status = 'Available';
        $this->img_path = 'storage/uploads/orderd/default_order.png';
        $this->user_id = Auth::user()->id;
        $this->created_at = now();
        $this->updated_at = now();
    }

    public function getTitle(): string
    {
        if (isset($order) && isset($order->title) && !is_null($order->title)) {
            return $order->title;
        }

        return 'Fara titlu';
    }

    public function getDescription(): string
    {
        if (isset($order) && isset($order->description) && !is_null($order->description)) {
            return $order->description;
        }

        return 'Fara descriere';
    }

    public function getQuantity(): string
    {
        if (isset($order) && isset($order->quantity) && !is_null($order->quantity)) {
            return $order->quantity;
        }

        return 'Fara cantitate';
    }

    public function getExpireDate(): string
    {
        if (isset($order) && isset($order->expire_date) && !is_null($order->expire_date)) {
            return $order->expire_date;
        }

        return 'Fara data de expirare';
    }

    public function getImgPath(): string
    {
        if (isset($order) && isset($order->img_path) && !is_null($order->img_path)) {
            return  asset('storage/' . $order->img_path);
        }

        return asset('storage/uploads/orders/default_order.png');
    }

    public function getMinQuantity(): string
    {
        if (isset($order) && isset($order->min_quantity) && !is_null($order->min_quantity)) {
            return $order->min_quantity;
        }

        return 'Fara cantitate minima';
    }
}
