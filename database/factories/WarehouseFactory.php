<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warehouse>
 */
class WarehouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'variant_id' => \App\Models\Variant::inRandomOrder()->first()->id,
            'input_price' => $this->faker->randomFloat(2, 1, 1000), // Giá nhập ngẫu nhiên từ 1 đến 1000
            'stock' => $this->faker->numberBetween(0, 1000), // Số lượng trong kho
            'created_by' => \App\Models\Account::inRandomOrder()->first()->id,
            'updated_by' => \App\Models\Account::inRandomOrder()->first()->id,
        ];
    }
}
