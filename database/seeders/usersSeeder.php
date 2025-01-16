<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'username' => 'admin',
            'address' => 'Jalan Raya Pattimura',
            'number' => '08123456789',
            'password' => 'admin123',
        ]);

        User::create([
            'username' => 'admin123',
            'address' => '123 Main St, Springfield',
            'number' => '1234567890',
            'password' => Hash::make('admin') // Ganti dengan password yang diinginkan
        ]);

        // User::factory(99)->create();
    }
}