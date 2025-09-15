<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TaskManager;
use Illuminate\Support\Str;

class TaskManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 50; $i++) {
            TaskManager::create([
                'title' => Str::random(10),
                'start_date' => $faker->dateTimeBetween('2025-09-12', '2025-09-13'),
                'due_date' => $faker->dateTimeBetween('2025-09-14', '2025-09-15'),
                'status' => $faker->randomElement(['new', 'inProgress', 'completed']),
                'description' => $faker->text(200),
                'estimated_time' => $faker->numberBetween(1, 40), // giờ ước tính
                'percent_done' => $faker->randomElement([10, 0, 20, 30, 40, 50, 60, 70, 80, 90, 100]),
                 // phần trăm hoàn thành
            ]);
        }
    }
}
