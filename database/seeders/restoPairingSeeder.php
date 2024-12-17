<?php

namespace Database\Seeders;

use App\Models\restoPairing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class restoPairingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        restoPairing::factory(99)->create();
    }
}