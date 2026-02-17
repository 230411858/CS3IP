<?php

namespace Database\Seeders;

use App\Models\StudentHasGuardian;
use Illuminate\Database\Seeder;

class StudentHasGuardianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentHasGuardian::factory()->create([
            "student_id" => 4,
            "guardian_id" => 3
        ]);
    }
}
