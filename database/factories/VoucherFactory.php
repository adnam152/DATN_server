<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Voucher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voucher>
 */
class VoucherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->lexify('VOUCHER???'), 
            'discount_type' => $this->faker->randomElement(Voucher::DISCOUNT_TYPE), 
            'discount_value' => $this->faker->randomFloat(2, 1, 100),
            'min_order_value' => $this->faker->randomFloat(2, 0, 50), 
            'max_discount_value' => $this->faker->randomFloat(2, 0, 20), 
            'usage_limit' => $this->faker->numberBetween(1, 100), 
            'usage_count' => $this->faker->numberBetween(0, 10), 
            'status' => $this->faker->randomElement(Voucher::STATUS), 
            'start_date' => $this->faker->dateTimeBetween('now', '+1 month'), 
            'end_date' => $this->faker->dateTimeBetween('+1 month', '+6 months'), 
            'created_by' => Account::inRandomOrder()->first()->id,
            'updated_by' => Account::inRandomOrder()->first()->id,
        ];
    }
}
