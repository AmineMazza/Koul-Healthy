<?php

namespace Database\Factories;

use App\Models\User;
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
        $user = User::all()->random();

        return [
            'title' => fake()->sentence(5),
            'image' => fake()->image(),
            'description' => fake()->text(),
            'price' => fake()->numberBetween(10, 100),
            'user_id' => $user->id,

        ];
    }
}
