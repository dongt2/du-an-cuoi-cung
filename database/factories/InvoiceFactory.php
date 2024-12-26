<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\invoice>
 */
class InvoiceFactory extends Factory
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
            'total_amount' => fake()->numberBetween(30, 500) * 1000,
            'status' => fake()->randomElement(['paid', 'unpaid', 'canceled']),
            'date' => fake()->dateTime(),
        ];
    }
}
