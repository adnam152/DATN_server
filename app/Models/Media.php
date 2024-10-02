<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    const RELATED_TYPE = [ 'products', 'sliders'];
    const TYPE = [ 'image', 'video' ];
}
