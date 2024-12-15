<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Restaurant::factory()
        ->count(5) // Jumlah restoran
        ->hasMenus(10) // Setiap restoran memiliki 10 menu
        ->create();
    }
}