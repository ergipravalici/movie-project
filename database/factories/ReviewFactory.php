<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'movie_id' => \App\Models\Movie::factory(),
            'comment' => $this->faker->paragraph(),
            'status' => 'pending', // Default status
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function approved(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'approved',
            ];
        });
    }

    public function pending(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'pending',
            ];
        });
    }
}