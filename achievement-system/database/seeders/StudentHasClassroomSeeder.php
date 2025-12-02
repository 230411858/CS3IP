<?php

namespace Database\Seeders;

use App\Models\StudentHasClassroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentHasClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentHasClassroom::factory(5)->create();
    }
}
