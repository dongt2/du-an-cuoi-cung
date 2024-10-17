<?php

namespace Database\Factories;

use App\Models\voucher;
use App\Models\Booking;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'voucher_id' => Voucher::factory(),
            'booking_id' => Booking::factory(),
            'user_id' => User::factory(),
            'payment_method' => fake()->randomElement(['Credit Card', 'PayPal', 'Bank Transfer']),
            'total' => fake()->randomFloat(2, 10, 1000),
            'date_time' => fake()->dateTime(),
        ];
    }
}
