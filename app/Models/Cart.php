<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'account_id',
    ];
    use HasFactory;
    public function cartItems() {
        return $this->hasMany(CartItem::class, 'cart_id', 'id');
    }
    public function Account() {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }
}
