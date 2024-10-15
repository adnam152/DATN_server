<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CheckVoucher>
 */
class CheckVoucherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'account_id' => \App\Models\Account::inRandomOrder()->first()->id,
            'voucher_id' => \App\Models\Voucher::inRandomOrder()->first()->id, 
            'order_id' => \App\Models\Order::inRandomOrder()->first()->id,
        ];
    }
}
