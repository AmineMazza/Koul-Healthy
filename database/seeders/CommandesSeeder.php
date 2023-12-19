<?php

namespace Database\Seeders;

use App\Models\commande;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommandesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        commande::factory(10)->create();   
    }
}
