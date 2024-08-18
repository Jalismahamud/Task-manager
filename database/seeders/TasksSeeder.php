<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 100; $i++) {

            Task::create([
                'title' => fake()->sentence(2),
                'description' => fake()->sentence(20),
                'create_date' =>now()->addDays(rand(1, 30)),
                'due_date' => now()->addDays(rand(30, 60))
            ]);
        }
    }
}
