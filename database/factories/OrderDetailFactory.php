<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order_detail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => \App\Models\Order::inRandomOrder()->first()->id,
            'product_name' => $this->faker->word,
            'attributes' => json_encode($this->faker->words(3)), // Giả lập thuộc tính sản phẩm
            'thumbnail' => $this->faker->imageUrl(), // URL hình ảnh ngẫu nhiên
            'unit_price' => $this->faker->numberBetween(1000, 10000), // Giả lập giá đơn vị
            'quantity' => $this->faker->numberBetween(1, 5), 
        ];
    }
}
