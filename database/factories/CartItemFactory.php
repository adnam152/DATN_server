<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Variant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart_item>
 */
class CartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cart_id' => Cart::inRandomOrder()->first()->id,   
            'variant_id' => Variant::inRandomOrder()->first()->id,
            'quantity' => $this->faker->numberBetween(1, 10), 
        ];
    }
}
