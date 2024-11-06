<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, 10),
            'movie_id' => fake()->numberBetween(1, 10),
            'showtime_id' => fake()->numberBetween(1, 10), 
            'seat_id' => fake()->numberBetween(1, 10),
            'ordercombo_id' => fake()->optional()->numberBetween(1, 10), 
            'total_price' => fake()->randomFloat(2, 50000, 500000),
        ];
    }
}
