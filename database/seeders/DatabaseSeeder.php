<?php

namespace Database\Seeders;

use App\Models\Unit;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Hash;

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

       
        $materialsList = ["wood", "metal", "paper", "plastic", "glass", "cotton", "leather"];

        for ($i = 0; $i < 5; $i++) {
            $categoryId = rand(1, 4); // Catégorie aléatoire de 1 à 4

            // Générez un tableau aléatoire de matériaux
            $materials = array_rand(array_flip($materialsList), rand(1, count($materialsList)));
            $difficulty = rand(1, 5); // Générez un nombre aléatoire entre 1 et 5

            Product::factory()->create([
                'product_name' => "Produit $i",
                'small_description' => "Small Description for Produit $i",
                'description' => "Description for Produit $i",
                'category_id' => $categoryId,
                'unit_id' => '1',
                'product_code' => IdGenerator::generate([
                    'table' => 'products',
                    'field' => 'product_code',
                    'length' => 4,
                    'prefix' => 'PC'
                ]),
                'stock' => rand(1, 100),
                'buying_price' => rand(10, 100),
                'selling_price' => rand(50, 200),
                'isActive' => true,
                'product_image' => "https://fakeimg.pl/200x200/ff0000/000",
                'materials' => json_encode($materials),
                 'difficulty' => $difficulty,
            ]);
        }
    }
}
