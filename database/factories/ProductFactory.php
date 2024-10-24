<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'slug' => $this->faker->unique()->slug, // Tạo slug duy nhất
            'sku' => $this->faker->unique()->numerify('SKU-#####'), // Tạo mã SKU duy nhất
            'thumbnail' => $this->faker->imageUrl(), // URL hình ảnh ngẫu nhiên
            'description' => $this->faker->paragraph,
            'short_description' => $this->faker->sentence,
            'catalogue_id' => \App\Models\Catalogue::inRandomOrder()->first()->id,
            'brand_id' => \App\Models\Brand::inRandomOrder()->first()->id,
            'sale_count' => $this->faker->numberBetween(0, 100),
            'view_count' => $this->faker->numberBetween(0, 1000),
            'wish_count' => $this->faker->numberBetween(0, 500),
            'created_by' => \App\Models\Account::inRandomOrder()->first()->id,
            'updated_by' => \App\Models\Account::inRandomOrder()->first()->id,
        ];
    }
}
