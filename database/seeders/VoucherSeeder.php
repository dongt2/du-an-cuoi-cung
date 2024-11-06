<?php

namespace Database\Seeders;

use App\Models\voucher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Voucher::truncate();
        
        Voucher::factory(10)->create();
        
        Schema::enableForeignKeyConstraints();
    }
}
