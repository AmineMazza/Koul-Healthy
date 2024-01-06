<?php

namespace Database\Seeders;

use App\Models\LineCommande;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LineCommandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LineCommande::factory(10)->create();   

    }
}
