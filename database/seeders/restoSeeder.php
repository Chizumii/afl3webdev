<?php

namespace Database\Seeders;

use App\Models\resto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class restoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        resto::factory()->count(100)->create();

    }
}