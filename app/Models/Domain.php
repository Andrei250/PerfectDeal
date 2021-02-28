<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Domain extends Model
{
    use HasFactory;

    protected $table = 'domains';

    protected $fillable = [
      'name',
      'slug',
      'icon_path',
    ];

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function getIconPath(): string
    {
        if (isset($this->icon_path) && !is_null($this->icon_path)) {
            return asset('storage/' . $this->icon_path);
        }

        return asset('storage/uploads/orders/default_order.png');
    }

    public function getName(): string
    {
        if (isset($this->name) && !is_null($this->name)) {
            return $this->name;
        }

        return "Fara nume";
    }

}
