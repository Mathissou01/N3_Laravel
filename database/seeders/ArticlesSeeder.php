<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Génération de 20 articles de test
        $articlesData = [];

        for ($i = 1; $i <= 10; $i++) {
            $articlesData[] = [
                'title' => 'Article ' . $i,
                'slug' => 'article-' . $i,
                'buying_price' => rand(10, 100), 
                'category_id' => rand(1, 4), 
                'unit_id' => rand(1, 3), 
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insertion des articles dans la base de données
        DB::table('articles')->insert($articlesData);
    }
}
