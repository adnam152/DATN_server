<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    use HasFactory;

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function tag() {
        return $this->belongsTo(Tag::class, 'tag_id', 'id');
    }
    
}
