<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tagName = $this->faker->unique()->word;
        return [
            'tag_name' => $tagName,
            'tag_type' => $this->faker->randomElement(['product', 'blog', 'other']), // Loại tag ngẫu nhiên
            'tag_slug' => Str::slug($tagName), // Tạo slug từ tên tag
        ];
    }
}
