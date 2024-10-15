<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;
    public function product() {
        return $this->belongsTo(Product::class);    
    }
    public function statuses()
    {
        return $this->morphMany(Status::class, 'statusAble');
    }
    public function productsOnSales() {
        return $this->hasMany(ProductsOnSale::class, 'variant_id', 'id');
    }
    public function variantsAttributeValues() {
        return $this->hasMany(VariantsAttributeValue::class, 'variant_id', 'id');
    }
    public function CartItems() {
        return $this->hasMany(CartItem::class, 'variant_id', 'id');
    }
    public function warehouses() {
        return $this->belongsToMany(Warehouse::class, 'warehouse_variant', 'variant_id', 'warehouse_id');
    }
    public function createdBy() {
        return $this->belongsTo(Account::class, 'created_by', 'id');
    }
    public function updatedBy() {
        return $this->belongsTo(Account::class, 'updated_by', 'id');
    }

}
