<?php

namespace Database\Factories;

use App\Models\Recette;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recette>
 */
class RecetteFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'         => fake()->sentence,
            'content'       => fake()->text,
            'user_id'       => User::factory(),
        ];
    }


}
