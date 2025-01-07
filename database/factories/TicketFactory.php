<?php

namespace Database\Factories;

use App\Models\transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transaction_id' => fake()->numberBetween(1, 10),
            'booking_id' => fake()->numberBetween(1, 10),
            'user_id' => fake()->numberBetween(1, 10),
            'movie_id' => fake()->numberBetween(1, 10),
            'showtime_id' => fake()->numberBetween(1, 10),
            'seats' => 'seats',
            'qr_code' => 'qr_code',
            'token' => fake()->uuid(),

        ];
    }
}
