<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentsHaveFriends>
 */
class StudentsHaveFriendsFactory extends Factory
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
            'friend_id' => User::where('type', '=', 'student')->inRandomOrder()->first()->id,
            'pending' => true,
        ];
    }
}
