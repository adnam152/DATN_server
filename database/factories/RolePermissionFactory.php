<?php

namespace Database\Factories;

use App\Http\Traits\PairHelper;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RolePermissionFactory extends Factory
{
    use PairHelper;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $uniquePair = $this->generateUniquePair('role_permissions', 'role_id', 'permission_id', Role::class, Permission::class);

        echo $uniquePair['role_id'] . ' - ' . $uniquePair['permission_id'] . PHP_EOL;
        return [
            'role_id' => $uniquePair['role_id'],
            'permission_id' => $uniquePair['permission_id'],
        ];
    }
}
