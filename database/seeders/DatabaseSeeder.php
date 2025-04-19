<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Rating;
use App\Models\Review;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create only the two required roles
        Role::insert([
            ['id' => 1, 'name' => 'admin'],
            ['id' => 2, 'name' => 'user']
        ]);

        // Create single admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role_id' => 1,
        ]);

        // Create 4 regular users
        User::factory()
            ->count(10)
            ->create(['role_id' => 2]);

        // Create 20 movies
        Movie::factory()
            ->count(10)
            ->create();

        // Create 20 approved reviews
        Review::factory()
            ->count(2)
            ->approved()
            ->create();

        // // Create 15 pending reviews
        Review::factory()
            ->count(2)
            ->pending()
            ->create();

        // // Create 20 ratings (1-5 stars)
        Rating::factory()
            ->count(10)
            ->create();
    }
}