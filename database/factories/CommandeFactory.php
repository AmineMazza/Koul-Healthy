<?php

namespace Database\Factories;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\commande>
 */
class CommandeFactory extends Factory
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
            'date_commande' => fake()->dateTimeBetween('now'),
            'statut_commande' => fake()->randomElement(['en attente', 'payée', 'annulé', 'livrée']),
            'user_id' => $user->id,
        ];
    }
}
