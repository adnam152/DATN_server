<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function productTags() {
        return $this->hasMany(ProductTag::class, 'tag_id', 'id');
    }
    public function blogTags() {
        return $this->hasMany(BlogTag::class, 'tag_id', 'id');
    }
}
