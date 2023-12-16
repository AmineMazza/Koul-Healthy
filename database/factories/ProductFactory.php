<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => fake()->sentence(5),
            'image' => fake()->image(),
            'description' => fake()->text(),
            'Is_Favoris' => fake()->boolean(0),
            'prix' => fake()->randomFloat(1, 100),
        ];
    }
}
