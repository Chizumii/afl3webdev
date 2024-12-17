<?php

namespace Database\Seeders;

use App\Models\category;
use App\Models\deliveryStatus;
use App\Models\menu;
use App\Models\menuDate;
use App\Models\orderDetail;
use App\Models\orderUser;
use App\Models\resto;
use App\Models\restoPairing;
use App\Models\User;
use App\Models\users;
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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}