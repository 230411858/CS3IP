<?php

namespace Database\Seeders;

use App\Models\Administrator;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $root = User::factory()->create([
            'name' => 'Root',
            'email' => 'root@example.com',
            'password' => '123123123',
            'type' => 'administrator'
        ]);

        Administrator::create(['user_id' => $root->id]);

        // Administrator::factory()->create();
    }
}
