<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    const PAGE = ['home', 'all_product', 'blog'];
    const OBJECT_FIT = ['cover', 'contain'];

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
    public function createdBy() {
        return $this->belongsTo(Account::class, 'created_by', 'id');
    }
    public function updatedBy() {
        return $this->belongsTo(Account::class, 'updated_by', 'id');
    }
}
