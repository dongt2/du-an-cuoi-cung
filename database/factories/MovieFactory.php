<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'duration' => fake()->numberBetween(60, 180) . ' min',
            'country' => fake()->country(),
            'director' => fake()->name(),
            'description' => fake()->paragraph(),
            'year' => fake()->year(),
            'release_date' => fake()->date(),
            'actors' => implode(', ', fake()->words(5)),
            'cover_image' => fake()->imageUrl(640, 480, 'movies', true),
            'trailer_url' => fake()->url(),
            'category_id' => fake()->numberBetween(1, 5),
        ];
    }
}
