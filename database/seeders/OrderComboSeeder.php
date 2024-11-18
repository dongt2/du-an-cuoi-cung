<?php

namespace Database\Seeders;

use App\Models\OrderCombo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderComboSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderCombo::factory(10)->create();
    }
}
