<?php

namespace Database\Seeders;

use App\Models\orderDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class orderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        orderDetail::factory(99)->create();
    }
}