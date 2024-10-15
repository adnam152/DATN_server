<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Variant>
 */
class VariantFactory extends Factory
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
            'status_id' => \App\Models\Status::inRandomOrder()->first()->id,
            'created_by' => \App\Models\Account::inRandomOrder()->first()->id,
            'updated_by' => \App\Models\Account::inRandomOrder()->first()->id,
        ];
    }
}
