<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Achievement;
use App\Models\ParentHasChild;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Seed users

        User::factory()->create([
            'name' => 'admin root',
            'email' => 'root@example.com',
            'password' => '12345678',
            'type' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'Example Teacher',
            'email' => 'teacher@example.com',
            'password' => '12345678',
            'type' => 'teacher'
        ]);

        User::factory()->create([
            'name' => 'Example Parent',
            'email' => 'parent@example.com',
            'password' => '12345678',
            'type' => 'parent'
        ]);

        User::factory()->create([
            'name' => 'First Student',
            'email' => 'student1@example.com',
            'password' => '12345678',
        ]);

        User::factory()->create([
            'name' => 'Second Student',
            'email' => 'student2@example.com',
            'password' => '12345678',
        ]);

        // Seed achievements

        Achievement::factory()->create([
            'type' => 'badge',
            'title' => 'My First Badge',
            'description' => 'You got over 97% achievement this term, good job!',
            'awarded_to' => 3,
            'awarded_by' =>  2,
        ]);

        Achievement::factory()->create([
            'type' => 'medal',
            'title' => 'My First Medal',
            'description' => 'You got over 97% achievement over this academic year, excellent work!',
            'awarded_to' => 3,
            'awarded_by' =>  2,
        ]);

        Achievement::factory()->create([
            'type' => 'trophy',
            'title' => 'My First Trophy',
            'description' => 'You got over 97% achievement this term, good job!',
            'awarded_to' => 3,
            'awarded_by' =>  2,
        ]);

        // Seed parent child relationships

        ParentHasChild::factory()->create([
            'parent' => 3,
            'child' => 4,
        ]);

        ParentHasChild::factory()->create([
            'parent' => 3,
            'child' => 5,
        ]);
    }
}
