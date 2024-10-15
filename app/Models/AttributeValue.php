<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;
    public function variantsAttributeValues() {
        return $this->hasMany(VariantsAttributeValue::class, 'attribute_value_id', 'id');
    }
    public function attributes() {
        return $this->belongsTo(Attribute::class, 'attribute_id', 'id');
    }
    public function createdBy() {
        return $this->belongsTo(Account::class, 'created_by', 'id');
    }
    public function updatedBy() {
        return $this->belongsTo(Account::class, 'updated_by', 'id');
    }
    
}
