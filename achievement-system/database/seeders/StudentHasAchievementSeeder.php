<?php

namespace Database\Seeders;

use App\Models\StudentHasAchievement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentHasAchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentHasAchievement::factory()->create([
            "student_id"=> 3,
            "achievement_id" => 1
        ]);

        StudentHasAchievement::factory()->create([
            "student_id"=> 3,
            "achievement_id" => 2
        ]);

        StudentHasAchievement::factory()->create([
            "student_id"=> 3,
            "achievement_id" => 3
        ]);
    }
}
