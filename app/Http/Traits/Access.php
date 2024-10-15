<?php
namespace App\Http\Traits;
use Illuminate\Database\Eloquent\Model;
trait Access
{
    protected function hasPermission($permission)
    {
        $permissions = auth()->user()->role->permissions;
        return $permissions->contains('name', $permission);
    }
    protected function canAccess(Model $model): bool
    {
        return !($model->user_id != auth()->id());
    }
    protected function canAccessByRole(Model $model): bool
    {
        return $this->hasPermission('access') || $this->canAccess($model);
    }
}


?>