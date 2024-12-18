<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
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
        ];

        // Loop untuk memasukkan kategori ke database
        foreach ($categories as $category) {
            Category::create([
                'category_name' => $category
            ]);
        }
    }
}
