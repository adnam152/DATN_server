<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    public function variant() {
        return $this->belongsToMany(Variant::class, 'variant_id', 'id');
    }
    public function statuses()
    {
        return $this->morphMany(Status::class, 'statusable');
    }
    public function createdBy() {
        return $this->belongsTo(Account::class, 'created_by', 'id');
    }
    public function updatedBy() {
        return $this->belongsTo(Account::class, 'updated_by', 'id');
    }
}
