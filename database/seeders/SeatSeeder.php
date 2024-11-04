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
        for ($screen_id = 1; $screen_id <= 2; $screen_id++) {
            Seat::factory()->count(166)->create([
                'screen_id' => $screen_id,
            ]);
        }
    }
}
