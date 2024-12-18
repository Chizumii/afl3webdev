<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_name' => [
                'Indonesian Food',
                'Chinese Food',
                'Japanese Food',
                'Korean Food',
                'Thai Food',
                'Vietnamese Food',
                'Indian Food',
                'Malaysian Food',
                'Filipino Food',
                'Bangladeshi Food',
                'Pakistani Food',
                'Sri Lankan Food',
                'Nepalese Food',
                'Bengali Food',
                'Turkish Food',
                'Greek Food',
                'Italian Food',
                'Spanish Food',
                'Portuguese Food',
                'German Food',
                'French Food',
                'American Food',
                'Mexican Food',
                'Swiss Food',
                'British Food'
            ]
        ];
    }
}
