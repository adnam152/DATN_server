<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'variant_id',
        'quantity',
    ];
    public function carts() {
        return $this->belongsTo(Cart::class, 'cart_id', 'id');
    }
    public function variant() {
        return $this->belongsTo(Variant::class, 'variant_id', 'id');
    }
    public function statuses()
    {
        return $this->morphMany(Status::class, 'statusAble');
    }
}
