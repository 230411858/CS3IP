<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'awarded_to' => 3,
            'awarded_by' => 2
        ];
    }
}
