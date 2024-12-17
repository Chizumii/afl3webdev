<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\resto>
 */
class restoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'resto_name'=> $this->faker->company(),
            'address'=> $this->faker->address(),
            'number'=> $this->faker->phoneNumber(),
        ];
    }
}