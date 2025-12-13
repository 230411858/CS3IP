<?php

namespace Database\Factories;

use App\Models\Classroom;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserHasClassroom>
 */
class UserHasClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::where('type', '=', 'student')->orWhere('type', '=', 'teacher')->inRandomOrder()->first()->id,
            'classroom_id' => Classroom::inRandomOrder()->first()->id
        ];
    }
}
