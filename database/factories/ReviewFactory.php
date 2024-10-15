<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => \App\Models\Product::inRandomOrder()->first()->id,
            'is_reviewed' => $this->faker->boolean,
            'account_id' => \App\Models\Account::inRandomOrder()->first()->id,
            'rating' => $this->faker->randomElement(array_values(\App\Models\Review::RATING)), // Lựa chọn ngẫu nhiên giá trị rating
            'comment' => $this->faker->paragraph, // Giả lập bình luận
        ];
    }
}
