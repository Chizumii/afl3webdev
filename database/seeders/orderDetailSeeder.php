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
        orderDetail::create([
            'order_user_id' => 101,
            'menu_date_id' => 1, // assuming menu ID 1 exists
            'delivery_status_id' => 1, // assuming a valid delivery status ID
            'price' => 150000, // example price per unit
            'unit' => 3, 
        ]);

        orderDetail::factory(100)->create();
    }
}