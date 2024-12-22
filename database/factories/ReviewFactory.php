<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\review>
 */
class ReviewFactory extends Factory
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
            'user_id' => fake()->numberBetween(1, 10),
            'review_date' => fake()->date(),
            'comment' => fake()->text(500), 
            'rating' => fake()->randomElement(['1sao', '2sao', '3sao', '4sao', '5sao']),
        ];
    }
}
