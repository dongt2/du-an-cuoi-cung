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

        Seat::factory(10)->create();
        
        Schema::enableForeignKeyConstraints();

    }
}
