<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sku',
        'thumbnail',
        'description',
        'short_description',
        'sale_count',
        'view_count',
        'wish_count',
        'brand_id',
        'catalogue_id',
        'created_by',
        'updated_by',
    ];

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class, 'product_id', 'id');
    }

    public function variants()
    {
        return $this->hasMany(Variant::class, 'product_id', 'id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'id');
    }
    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
    public function catalogue() {
        return $this->belongsTo(Catalogue::class, 'catalogue_id', 'id');
    }
    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
    public function createdBy() {
        return $this->belongsTo(Account::class, 'created_by', 'id');
    }
    public function updatedBy() {
        return $this->belongsTo(Account::class, 'updated_by', 'id');
    }
    public function statuses()
    {
        return $this->morphMany(Status::class, 'statusAble');
    }
    
    public function productTags() {
        return $this->hasMany(ProductTag::class, 'product_id', 'id');
    }

}
