<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    public function rolePermissions() {
        return $this->hasMany(RolePermission::class, 'permission_id', 'id');
    }
}
