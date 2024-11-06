<?php

namespace Database\Seeders;

use App\Models\screen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ScreenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Screen::truncate();

        Screen::factory(10)->create();

        Schema::enableForeignKeyConstraints();

    }
}
