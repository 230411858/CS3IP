<?php

namespace Database\Seeders;

use App\Models\User;
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

        User::factory()->create([
            'name' => 'root',
            'email' => 'root@example.com',
            'password' => '12345678',
            'type' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'teacher',
            'email' => 'teacher@example.com',
            'password' => '12345678',
            'type' => 'teacher'
        ]);

        User::factory()->create([
            'name' => 'student',
            'email' => 'student@example.com',
            'password' => '12345678',
        ]);
    }
}
