<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seat>
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

        // Đảm bảo chỉ số không vượt quá số lượng phần tử trong mảng places
        $place = $places[self::$index % count($places)];

        self::$index++;

        // Xác định giá trị dựa trên chữ cái đầu tiên của place
        $firstLetter = substr($place, 0, 1);
        $price = match ($firstLetter) {
            'A', 'B', 'C', 'D' => '10',
            'E', 'F', 'G', 'I' => '20',
            'J', 'K', 'L' => '30',
            default => '10', // Mặc định là 10 nếu không khớp
        };

        return [
            'place' => $place, 
            'price' => $price,
            'status' => 'Còn trống',
        ];
    }
}
