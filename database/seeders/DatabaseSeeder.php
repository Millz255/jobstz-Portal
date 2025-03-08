<?php

namespace Database\Seeders;

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
        // Create the specific "Test User"
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create 10 additional users using the UserFactory
        User::factory()->count(10)->create();

        // Call CategorySeeder to run category seeding
        $this->call(CategorySeeder::class);

        // Call LocationSeeder to run location seeding
        $this->call(LocationSeeder::class);
    }
}