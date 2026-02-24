<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User (no factory)
        User::updateOrCreate(
            ['email' => 'admin@career.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        // Call other seeders
        $this->call([
            CareerPathSeeder::class,
            QuizQuestionSeeder::class,
            InternshipSeeder::class,
        ]);
    }
}