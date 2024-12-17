<?php

namespace Database\Seeders;

use App\Models\deliveryStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class deliveryStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        deliveryStatus::factory(99)->create();
    }
}