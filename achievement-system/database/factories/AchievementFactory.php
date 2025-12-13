<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Achievement>
 */
class AchievementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['badge', 'medal', 'trophy']),
            'title' => fake()->text(),
            'description' => fake()->text(),
            'teacher_id' => User::where('type', '=', 'teacher')->inRandomOrder()->first()->id
        ];
    }
}
