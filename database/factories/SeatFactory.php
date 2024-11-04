<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\seat>
 */
class SeatFactory extends Factory
{
    private static $index = 0; // Biến toàn cục để theo dõi chỉ số ghế

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $places = [];
        foreach (range(2, 17) as $i) {
            $places[] = 'A' . $i;
        }
        foreach (range(1, 18) as $i) {
            $places[] = 'B' . $i;
        }
        foreach (range(1, 18) as $i) {
            $places[] = 'C' . $i;
        }
        foreach (range(1, 18) as $i) {
            $places[] = 'D' . $i;
        }
        foreach (range(1, 18) as $i) {
            $places[] = 'E' . $i;
        }
        foreach (range(1, 18) as $i) {
            $places[] = 'F' . $i;
        }
        foreach (range(1, 18) as $i) {
            $places[] = 'G' . $i;
        }
        foreach (range(3, 16) as $i) {
            $places[] = 'I' . $i;
        }
        foreach (range(5, 14) as $i) {
            $places[] = 'J' . $i;
        }
        foreach (range(5, 14) as $i) {
            $places[] = 'K' . $i;
        }
        foreach (range(6, 13) as $i) {
            $places[] = 'L' . $i;
        }

        // Lấy giá trị ghế theo chỉ số hiện tại
        $place = $places[self::$index];

        // Tăng chỉ số để tiếp tục lấy giá trị trong lần chạy tiếp theo
        self::$index++;

        return [
            'screen_id' => "1", // ID của màn hình
            'place' => $place, // Số ghế theo thứ tự
            'price' => fake()->randomElement([10, 20, 30]), // Giá ngẫu nhiên
            'status' => fake()->randomElement(['Còn trống', 'Đã đặt', 'Đã hỏng']), // Trạng thái ngẫu nhiên
        ];
    }
}
