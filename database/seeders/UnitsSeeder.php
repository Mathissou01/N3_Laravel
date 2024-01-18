<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        // Données d'exemple pour les unités
        $unitsData = [
            ['name' => 'Unité 1', 'slug' => 'unite-1'],
            ['name' => 'Unité 2', 'slug' => 'unite-2'],
            ['name' => 'Unité 3', 'slug' => 'unite-3'],
            // Ajoutez autant d'unités que nécessaire
        ];

        // Insertion des unités dans la base de données
        DB::table('units')->insert($unitsData);
    }
}
