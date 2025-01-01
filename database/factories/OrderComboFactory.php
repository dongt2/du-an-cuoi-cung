<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\order_combo>
 */
class OrderComboFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'combo_id' => fake()->numberBetween(1, 10),
            'user_id' => fake()->numberBetween(1, 10),
            'total_price' => fake()->randomFloat(2, 50000, 500000),
            'quantity' => fake()->numberBetween(1, 5),
        ];
    }
}