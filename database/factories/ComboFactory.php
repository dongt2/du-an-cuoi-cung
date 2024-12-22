<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\combo>
 */
class ComboFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'combo_name' => fake()->words(3, true),
            'image' => '',
            'short_description' => fake()->sentence(15),
            'price' => fake()->randomFloat(0, 5, 50),
        ];
    }
}
