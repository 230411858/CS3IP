<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teacher = User::factory()->create([
            'name' => 'Test Teacher',
            'email' => 'teacher@example.com',
            'password' => '123123123',
            'type' => 'teacher'
        ]);

        Teacher::create(['user_id' => $teacher->id]);

        Teacher::factory()->create();
    }
}
