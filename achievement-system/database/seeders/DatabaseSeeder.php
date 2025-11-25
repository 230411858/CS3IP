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
            'name' => 'First Student',
            'email' => 'student1@example.com',
            'password' => '12345678',
        ]);

        User::factory()->create([
            'name' => 'Second Student',
            'email' => 'student2@example.com',
            'password' => '12345678',
        ]);
    }
}
