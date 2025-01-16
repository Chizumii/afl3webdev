<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\users;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\orderUser>
 */
// class orderUserFactory extends Factory
// {
//     /**
//      * Define the model's default state.
//      *
//      * @return array<string, mixed>
//      */
//     public function definition(): array
//     {
//         return [
//             'user_id'=> User::factory(),
//             'total_price'=> $this->faker->randomFloat(2, 10000.01, 600000.01),
//             'date'=> $this->faker->dateTimeThisYear(),
//             'is_payment_status'=> $this->faker->boolean(),
//         ];
//     }
// }