<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Achievement::factory()->create([
            "type" => "badge",
            "title" => "Your First Badge",
            "description"=> "Congratulations, you earned you first badge!",
            "teacher_id" => 2,
        ]);

        Achievement::factory()->create([
            "type" => "medal",
            "title" => "Your First Medal",
            "description"=> "Congratulations, you earned you first medal!",
            "teacher_id" => 2,
        ]);

        Achievement::factory()->create([
            "type" => "trophy",
            "title" => "Your First Trophy",
            "description"=> "Congratulations, you earned you first trophy!",
            "teacher_id" => 2,
        ]);

        Achievement::factory(5)->create();
    }
}
