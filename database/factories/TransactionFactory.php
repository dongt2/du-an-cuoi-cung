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

            'booking_id' => fake()->numberBetween(1, 10),
            'user_id' => fake()->numberBetween(1, 10),
            'payment_method' => 'online',
            'total' => fake()->numberBetween(10000, 100000),
            'payment_date'  => fake()->date(),
            'status_payment' => 'completed',
        ];
    }
}
