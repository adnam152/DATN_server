<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    const PAGE = ['home', 'all_product', 'blog'];
    const OBJECT_FIT = ['cover', 'contain'];
}
