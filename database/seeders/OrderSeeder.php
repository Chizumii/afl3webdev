<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
            'name' => 'Nasi Ayam Goreng Complete',
            'description' => 'Nasi + Ayam + dll',
            'price' => 15000,
            'quantity' => 1,
            'image' => 'images/nayamgoreng.jpg', // Pastikan file ini ada di storage atau public
        ]);
    }
}
