<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\voucher>
 */
class VoucherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'voucher_name' => fake()->word(),
            'code' => fake()->unique()->bothify('VOUCHER-##??'),
            'start_date' => fake()->date(),
            'end_date' => fake()->dateTimeBetween('now', '+1 month'),
            'quantity' => fake()->numberBetween(1, 100),
            'deduct_amount' => fake()->randomFloat(2, 5, 100),
        ];
    }
}
