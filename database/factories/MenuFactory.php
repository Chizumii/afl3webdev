<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'restaurant_id' => Restaurant::factory(), // Relasi dengan restoran
            'name' => $this->faker->word, // Nama menu
            'description' => $this->faker->sentence, // Deskripsi menu
            'image' => 'default.jpg', // Nama file gambar
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
