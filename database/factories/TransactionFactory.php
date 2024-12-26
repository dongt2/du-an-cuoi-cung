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
            'voucher_id' => fake()->numberBetween(1, 10), 
            'booking_id' => fake()->numberBetween(1, 10),
            'user_id' => fake()->numberBetween(1, 10),

            'payment_method' => fake()->randomElement(['Credit Card', 'PayPal', 'Bank Transfer']),
            'total' => fake()->numberBetween(30, 500) * 1000,
            'date_time' => fake()->dateTime(),
        ];
    }
}
