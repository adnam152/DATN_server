<?php

namespace Database\Factories;

use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Status::class;

    public function definition()
    {
        return [
            'status' => $this->faker->randomElement(['pending', 'processing', 'completed', 'cancelled']),
            'statusable_id' => null,
            'statusable_type' => null,
        ];
    }
}
