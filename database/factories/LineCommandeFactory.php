<?php

namespace Database\Factories;

use App\Models\commande;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LineCommande>
 */
class LineCommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $Product = Product::all()->random();
        $Commande = commande::all()->random();

        return [
            'qte_commandée' => fake()->numberBetween(1, 10),
            'Price_total_commande' => fake()->numberBetween(10, 100),
            'produit_id' => $Product->id,
            'commande_id' => $Commande->id,
        ];
    }
}
