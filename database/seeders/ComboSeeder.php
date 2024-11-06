<?php

namespace Database\Seeders;

use App\Models\Combo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ComboSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Combo::truncate();

        Combo::factory(10)->create();

        Schema::enableForeignKeyConstraints();
    }
}
