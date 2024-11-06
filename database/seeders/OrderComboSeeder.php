<?php

namespace Database\Seeders;

use App\Models\OrderCombo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class OrderComboSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        OrderCombo::truncate();

        OrderCombo::factory(10)->create();

        Schema::enableForeignKeyConstraints();

    }
}
