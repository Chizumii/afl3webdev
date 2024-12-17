<?php

namespace Database\Seeders;

use App\Models\menuDate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class menuDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        menuDate ::factory(99)->create();
    }
}