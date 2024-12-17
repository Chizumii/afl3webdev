<?php

namespace Database\Seeders;

use App\Models\orderUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class orderUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        orderUser::factory(99)->create();
    }
}