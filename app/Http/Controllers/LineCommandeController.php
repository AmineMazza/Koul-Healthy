<?php

namespace App\Http\Controllers;

use App\Models\LineCommande;
use Illuminate\Http\Request;

class LineCommandeController extends Controller
{
    public function index()
    {
        $LineCommandes = LineCommande::all();
        return view('LineCommandes.show', compact('LineCommandes'));
    }
}
