<?php

namespace Database\Factories;

use App\Models\resto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\restoPairing>
 */
class restoPairingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'resto_id'=> resto::factory(),
            'category_id'=> $this->faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20.21,22,23,24,25])
        ];
    }
}