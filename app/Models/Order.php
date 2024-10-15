<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function checkVouchers() {
        return $this->hasMany(CheckVoucher::class, 'order_id', 'id');
    }

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
    public function payment() {
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }
    public function account() {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }
    public function statuses()
    {
        return $this->morphMany(Status::class, 'statusable');
    }
}
