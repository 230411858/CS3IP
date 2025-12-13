<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

use App\Models\Achievement;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentHasAchievement>
 */
class StudentHasAchievementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => User::where('type', '=', 'student')->inRandomOrder()->first()->id,
            'achievement_id' => Achievement::inRandomOrder()->first()->id,
        ];
    }
}
