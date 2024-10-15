<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    const DISCOUNT_TYPE = [
        'percent' => 'percent',
        'amount' => 'amount',
    ];
    const STATUS = [
        'active' => 'active',
        'inactive' => 'inactive',
        'expired' => 'expired',
    ];

    public function checkVouchers() {
        return $this->hasMany(CheckVoucher::class, 'voucher_id', 'id');
    }
    public function createdBy() {
        return $this->belongsTo(Account::class, 'created_by', 'id');
    }
    public function updatedBy() {
        return $this->belongsTo(Account::class, 'updated_by', 'id');
    }
}
