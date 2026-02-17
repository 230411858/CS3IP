<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classroom::factory()->create([
            "name"=> "First Classroom",
            "year_group" => 11,
            "description" => "Automatically generated classroom for year 11"
        ]);
        Classroom::factory(2)->create();
    }
}
