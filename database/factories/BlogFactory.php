<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->title(),
            'slug' => $this->faker->slug(),
            'thumbnail' => $this->faker->imageUrl(1280, 720, 'blog', true),
            'content' => $this->faker->text(),
            'created_by' => Account::inRandomOrder()->first()->id,
            'updated_by' => Account::inRandomOrder()->first()->id,  
        ];
    }
}
