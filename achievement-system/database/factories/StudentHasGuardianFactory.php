<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentHasGuardian>
 */
class StudentHasGuardianFactory extends Factory
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
            'guardian_id' => User::where('type', '=', 'guardian')->inRandomOrder()->first()->id,
        ];
    }
}
