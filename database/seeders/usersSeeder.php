<?php

namespace Database\Seeders;

use App\Models\users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        users::factory()->create([
            'username' => 'admin',
            'address' => 'Jalan Raya Pattimura',
            'number' => '08123456789',
            'password' => 'admin123',
        ]);

        users::factory(99)->create();
    }
}