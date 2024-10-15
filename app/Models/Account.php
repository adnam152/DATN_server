<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Account extends Authenticatable
{
    use HasFactory,
     HasApiTokens, 
     HasFactory, 
     Notifiable;


    protected $fillable = [
        'email',
        'phone_number',
        'full_name',
        'password',
        'address',
        'dob',
        'avatar',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function carts() {
        return $this->hasMany(Cart::class, 'account_id', 'id');
    }
    public function checkVouchers() {
        return $this->hasMany(CheckVoucher::class, 'account_id', 'id');
    }

    public function attributeValuesCreated() {
        return $this->hasMany(AttributeValue::class, 'created_by', 'id');
    }
    public function attributeValuesUpdated() {
        return $this->hasMany(AttributeValue::class, 'updated_by', 'id');
    }
    public function variantsCreated() {
        return $this->hasMany(Variant::class, 'created_by', 'id');
    }
    public function variantsUpdated() {
        return $this->hasMany(Variant::class, 'updated_by', 'id');
    }
    public function productsOnSalesCreated() {
        return $this->hasMany(ProductsOnSale::class, 'created_by', 'id');
    }
    public function productsOnSalesUpdated() {
        return $this->hasMany(ProductsOnSale::class, 'updated_by', 'id');
    }
    public function productsCreated() {
        return $this->hasMany(Product::class, 'created_by', 'id');
    }
    public function productsUpdated() {
        return $this->hasMany(Product::class, 'updated_by', 'id');
    }
    public function role() {
        return $this->belongsTo(Role::class, 'role_id', 'id');  
    } 
}
