<?php

namespace Database\Seeders;

use App\Models\UserHasClassroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserHasClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserHasClassroom::factory()->create([
            "user_id" => 2,
            "classroom_id" => 1
        ]);

        UserHasClassroom::factory()->create([
            "user_id" => 3,
            "classroom_id" => 1
        ]);

        UserHasClassroom::factory()->create([
            "user_id" => 4,
            "classroom_id" => 1
        ]);
    }
}
