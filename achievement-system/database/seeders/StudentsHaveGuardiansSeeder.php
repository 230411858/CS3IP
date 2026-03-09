<?php

namespace Database\Seeders;

use App\Models\StudentsHaveGuardians;
use Illuminate\Database\Seeder;

class StudentsHaveGuardiansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentsHaveGuardians::factory()->create([
            "student_id" => 4,
            "guardian_id" => 3
        ]);
    }
}
