<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\seat>
 */
class SeatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => fake()->randomElement(['Con', 'Het']),
            'seat_type' => fake()->randomElement(['Thuong', 'Vip']),
            'seat_number' => fake()->numberBetween(1, 100),
            'screen_id' => fake()->numberBetween(1, 10),
        ];
    }
}
