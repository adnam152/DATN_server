<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    const STATUS = ['trong kho', 'đang bán', 'chờ xác nhận', 'đang vận chuyển', 'đã giao', 'hủy'];
    const TYPE = ['variant', 'order'];
}
