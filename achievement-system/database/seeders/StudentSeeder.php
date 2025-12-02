<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $first_student = User::factory()->create([
            'name' => 'Test First Student',
            'email' => 'student1@example.com',
            'password' => '123123123',
            'type' => 'student'
        ]);

        Student::create(['user_id' => $first_student->id]);

        $second_student = User::factory()->create([
            'name' => 'Test Second Student',
            'email' => 'student2@example.com',
            'password' => '123123123',
            'type' => 'student'
        ]);

        Student::create(['user_id' => $second_student->id]);

        Student::factory(3)->create();
    }
}
