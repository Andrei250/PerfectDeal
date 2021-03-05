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
        'img_path',
        'price'
    ];

    protected $table = 'orders';

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderRequests(){
        return $this->hasMany(OrderRequest::class);
    }

    public function builder($title, $description, $quantity, $min_quantity, $expire_date, $price)
    {
        $this->title = $title;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->min_quantity = $min_quantity;
        $this->expire_date = $expire_date;
        $this->status = 'Available';
        $this->img_path = 'storage/uploads/orders/default_order.png';
        $this->user_id = Auth::user()->id;
        $this->created_at = now();
        $this->updated_at = now();
        $this->price = $price;
    }

    public function getTitle(): string
    {
        if (isset($this->title) && !is_null($this->title)) {
            return $this->title;
        }

        return 'Fara titlu';
    }

    public function getDescription(): string
    {
        if (isset($this->description) && !is_null($this->description)) {
            return $this->description;
        }

        return 'Fara descriere';
    }

    public function getQuantity(): string
    {
        if (isset($this->quantity) && !is_null($this->quantity)) {
            return $this->quantity;
        }

        return 'Fara cantitate';
    }

    public function getExpireDate(): string
    {
        if (isset($this->expire_date) && !is_null($this->expire_date)) {
            return date("d M Y", strtotime($this->expire_date));
        }

        return 'Fara data de expirare';
    }

    public function getImgPath(): string
    {
        if (isset($this->img_path) && !is_null($this->img_path)) {
            return asset('storage/' . $this->img_path);
        }

        return asset('storage/uploads/orders/default_order.png');
    }

    public function getMinQuantity(): string
    {
        if (isset($this->min_quantity) && !is_null($this->min_quantity)) {
            return $this->min_quantity;
        }

        return 'Fara cantitate minima';
    }

    public function getPrice(): string
    {
        if (isset($this->price) && !is_null($this->price)) {
            return $this->price;
        }

        return 'Fara pret';
    }

}
