<?php

namespace Database\Seeders;

use App\Models\StudentsHaveAchievements;
use Illuminate\Database\Seeder;

class StudentsHaveAchievementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentsHaveAchievements::factory()->create([
            "student_id"=> 4,
            "achievement_id" => 1
        ]);

        StudentsHaveAchievements::factory()->create([
            "student_id"=> 4,
            "achievement_id" => 2
        ]);

        StudentsHaveAchievements::factory()->create([
            "student_id"=> 4,
            "achievement_id" => 3
        ]);
    }
}
