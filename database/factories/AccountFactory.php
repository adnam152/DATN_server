<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'phone_number' => $this->faker->unique()->phoneNumber,
            'full_name' => $this->faker->name,
            'password' => bcrypt('password'), // Mật khẩu mặc định được mã hóa
            'address' => $this->faker->optional()->address,
            'dob' => $this->faker->optional()->date,
            'avatar' => 'https://scontent.fhan2-4.fna.fbcdn.net/v/t1.30497-1/453178253_471506465671661_2781666950760530985_n.png?stp=dst-png_s200x200&_nc_cat=1&ccb=1-7&_nc_sid=136b72&_nc_ohc=jZ-PuitTc3oQ7kNvgFPXrh8&_nc_ht=scontent.fhan2-4.fna&_nc_gid=A93kOtNb8x-2_b_4Y6Z_VDF&oh=00_AYCYBL1sdj57w_eiR8h2stcBub-AlQi8eaeRU3fQrifK0Q&oe=6724973A', // Avatar mặc định
            'role_id' => Role::inRandomOrder()->first()->id,
        ];
    }
}
