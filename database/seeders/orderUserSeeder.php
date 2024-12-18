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

        orderUser::create([
            'user_id' => 2,  // assuming user ID 1 exists in your users table
            'date' => now(),
            'is_payment_status' => true,  // assuming it's paid
            'total_price' => 450000,  // example total price for the order
        ]);


        orderUser::factory(1)->create();
    }
}
