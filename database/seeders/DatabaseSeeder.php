<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UnitsSeeder::class);
        $categories = [
            ['name' => 'Noel', 'isActive' => true, 'slug' => 'noel_slug'], // Modifier les slugs en conséquence
            ['name' => 'Paques', 'isActive' => true, 'slug' => 'paques_slug'],
            ['name' => 'St Valentin', 'isActive' => true, 'slug' => 'st_valentin_slug'],
            ['name' => 'Halloween', 'isActive' => true, 'slug' => 'halloween_slug'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        $this->call(ArticlesSeeder::class);
 
    }
}
