<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\showtime>
 */
class ShowtimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'movie_id' => fake()->numberBetween(1, 10),
            'screen_id' => fake()->numberBetween(1, 10),
            'showtime_date' => fake()->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            'time' => fake()->time('H:i:s'),
        ];
    }
}
