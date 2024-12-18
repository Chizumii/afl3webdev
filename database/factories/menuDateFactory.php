<?php

namespace Database\Factories;

use App\Models\menu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\menuDate>
 */
class menuDateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'menu_id'=> menu::factory(),
            'date'=> $this->faker->dateTimeBetween('2025-01-01', '2025-12-31')->format('Y-m-d'),
        ];
    }
}