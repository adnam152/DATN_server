<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Attribute;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attribute_value>
 */
class AttributeValueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'attribute_id' => Attribute::inRandomOrder()->first()->id,
            'value' => $this->faker->randomElement(['Đỏ', 'Xanh', 'Rộng', 'Vừa', 'Nhỏ']),
            'created_by' => Account::inRandomOrder()->first()->id,
            'updated_by' => Account::inRandomOrder()->first()->id,
        ];
    }
}
