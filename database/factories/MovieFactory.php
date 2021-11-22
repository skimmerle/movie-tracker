<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    public function definition()
    {
        return [
            'movie_id' => $this->faker->uuid(),
            'title' => $this->faker->unique()->text(25),
            'year' => $this->faker->year(),
            'seen' => $this->faker->boolean(),
        ];
    }
}
