<?php

namespace Database\Seeders;


use App\Models\Task;
use App\Models\Category;
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
        // Appel du seeder pour la table 'categories'
        $this->call(CategorySeeder::class);

        // Appel du seeder pour la table 'tasks'
        $this->call(TasksSeeder::class);
      
    }
}
