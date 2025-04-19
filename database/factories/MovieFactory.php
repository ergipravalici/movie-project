<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    protected $genres = ['Action', 'Comedy', 'Drama', 'Horror', 'Sci-Fi', 'Thriller'];

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(3),
            'release_year' => $this->faker->numberBetween(1950, date('Y')),
            'genre' => $this->faker->randomElement($this->genres),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}