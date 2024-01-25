<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasksData = [];

        for ($i = 1; $i <= 10; $i++) {
            $tasksData[] = [
                'name' => 'Tache ' . $i,
                'date' => now(), 
                'category_id' => rand(1, 4),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insertion des tâches dans la base de données
        DB::table('tasks')->insert($tasksData);
    }
}