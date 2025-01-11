<?php

namespace Database\Factories;

use App\Models\deliveryStatus;
use App\Models\menuDate;
use App\Models\orderUser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\orderDetail>
 */
class orderDetailFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_user_id' => orderUser::factory(),
            'menu_date_id'=> menuDate::factory(),
            'delivery_status_id'=> deliveryStatus::factory(),
            'price' => $this->faker->randomFloat(2, 10000.01, 600000.01),
            'unit' => $this->faker->numberBetween(1,10)
        ];
    }
}