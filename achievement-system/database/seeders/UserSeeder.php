<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            "name"=> "Root",
            "email"=> "root@example.com",
            "password"=> "123123123",
            "type"=> "administrator",
        ]);

        User::factory()->create([
            "name"=> "Example Teacher",
            "email"=> "teacher@example.com",
            "password"=> "123123123",
            "type"=> "teacher",
        ]);

        User::factory()->create([
            "name"=> "Example Student",
            "email"=> "student1@example.com",
            "password"=> "123123123"
        ]);

        User::factory()->create([
            "name"=> "Second Example Student",
            "email"=> "student2@example.com",
            "password"=> "123123123"
        ]);
    }
}
