<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    const RATING = [1, 2, 3, 4, 5];
    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');    
    }
    public function account() {
        return $this->belongsTo(Account::class, 'account_id', 'id');    
    }
}
