<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckVoucher extends Model
{
    use HasFactory;
    public function Account() {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }
    public function voucher() {
        return $this->belongsTo(Voucher::class, 'voucher_id', 'id');
    }
    public function order() {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
