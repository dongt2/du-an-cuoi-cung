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
            'user_id' => User::factory(), 
            'total_amount' => fake()->randomFloat(2, 50, 5000),
            'status' => fake()->randomElement(['paid', 'unpaid', 'canceled']),
            'date' => fake()->dateTime(),
        ];
    }
}
