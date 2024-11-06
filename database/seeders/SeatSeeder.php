<?php

namespace Database\Seeders;

use App\Models\seat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Seat::truncate();

        for ($screen_id = 1; $screen_id <= 2; $screen_id++) {
            Seat::factory()->count(166)->create([
                'screen_id' => $screen_id,
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
