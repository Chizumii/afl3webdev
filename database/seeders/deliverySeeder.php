<?php

namespace Database\Seeders;

use App\Models\deliveryStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class deliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deliveryStatus = [
            'status_name' => 'Pending',
                'Delivered',
                'Canceled',
                'Accepted',
                'Rejected',
                'On Delivery'
        ];
        foreach ($deliveryStatus as $deliveryStatus) {
            deliveryStatus::create([
                'status_name' => $deliveryStatus
            ]);
        }
    }
}