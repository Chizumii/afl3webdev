<?php

namespace Database\Seeders;

use App\Models\menu;
use App\Models\resto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class menuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        menu::factory()->count(100)->create();
    }
}