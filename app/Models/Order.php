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
}
