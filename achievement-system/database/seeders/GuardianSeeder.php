<?php

namespace Database\Seeders;

use App\Models\Guardian;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuardianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guardian = User::factory()->create([
            'name' => 'Test Guardian',
            'email' => 'guardian@example.com',
            'password' => '123123123',
            'type' => 'guardian'
        ]);

        Guardian::create(['user_id' => $guardian->id]);

        Guardian::factory()->create();
    }
}
