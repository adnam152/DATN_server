<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Account_name' => $this->faker->name,
            'Account_email' => $this->faker->unique()->safeEmail,
            'Account_phone_number' => $this->faker->phoneNumber,
            'Account_address' => $this->faker->address,
            'note' => $this->faker->optional()->sentence,
            'payment_id' => \App\Models\Payment::factory(),
            'status' => $this->faker->randomElement(['chờ xác nhận', 'đang vận chuyển', 'đã giao', 'hủy']),
            'is_paid' => $this->faker->boolean,
            'quantity' => $this->faker->numberBetween(1, 10),
            'voucher_discount' => $this->faker->numberBetween(0, 100), // Giả lập voucher discount
            'total_price' => $this->faker->numberBetween(10000, 100000), // Giả lập tổng giá
            'updated_by' => \App\Models\Account::inRandomOrder()->first()->id,
        ];
    }
}
