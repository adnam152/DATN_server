<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products_on_sale>
 */
class ProductsOnSaleFactory extends Factory
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
            'selling_price' => $this->faker->randomFloat(2, 10, 1000), // Giá bán ngẫu nhiên từ 10 đến 1000
            'discount_price' => $this->faker->randomFloat(2, 1, 9), // Giảm giá ngẫu nhiên từ 1 đến 9
            'stock' => $this->faker->numberBetween(0, 1000), // Số lượng trong kho
            'created_by' => \App\Models\Account::inRandomOrder()->first()->id,
            'updated_by' => \App\Models\Account::inRandomOrder()->first()->id,
        ];
    }
}
