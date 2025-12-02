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
        StudentHasAchievement::factory(20)->create();
    }
}
