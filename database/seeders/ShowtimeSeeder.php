<?php

namespace Database\Seeders;

use App\Models\Showtime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ShowtimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Showtime::truncate();
        
        Showtime::factory(10)->create();

        Schema::enableForeignKeyConstraints();

    }
}
