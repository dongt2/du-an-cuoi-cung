<?php

namespace Database\Seeders;

use App\Models\Seat;
use Illuminate\Database\Seeder;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($showtime_id = 1; $showtime_id <= 5; $showtime_id++) {
            Seat::factory()->count(166)->create([
                'showtime_id' => $showtime_id,
            ]);
        }
    }
}
