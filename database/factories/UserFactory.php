<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->Name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => fake()->boolean(80) ? now() : null, // 80% xác nhận email
            'password' => '123456', // bcrypt('password'), // Mật khẩu đã mã hóa
            'phone' => fake()->phoneNumber(), // Số điện thoại có thể không có
            'role' => fake()->randomElement(['Admin', 'Nhan Vien', 'khach Hang']),
            'is_active' => fake()->boolean(),
            'is_vip' => fake()->boolean(20), // 20% người dùng VIP
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}