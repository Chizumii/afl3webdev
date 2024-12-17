<?php

namespace Database\Seeders;

use App\Models\restopairing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class restoPairingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        restopairing::factory(99)->create();
    }
}