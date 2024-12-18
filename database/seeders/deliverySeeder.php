<?php

namespace Database\Seeders;

use App\Models\deliveryStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class deliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        deliveryStatus::create([
            'status_name' => 'Delivered',
        ]);
        deliveryStatus::factory(1)->create();
    }
}