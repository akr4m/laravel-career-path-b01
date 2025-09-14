<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => 'password',
        ]);

        $user = User::factory()->create([
            'name' => 'Normal User',
            'email' => 'user@example.com',
            'role' => 'user',
            'password' => 'password',
        ]);

        Task::factory()->count(5)->for($admin)->create();
        Task::factory()->count(5)->for($user)->create();
    }
}
