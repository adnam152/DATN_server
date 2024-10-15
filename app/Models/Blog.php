<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function createdBy() {
        return $this->belongsTo(Account::class, 'created_by', 'id');
    }
    public function updatedBy() {
        return $this->belongsTo(Account::class, 'updated_by', 'id');
    }
    public function blogTags() {
        return $this->hasMany(BlogTag::class, 'blog_id', 'id');
    }
    
}
