<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\commande;
use App\Models\LineCommande;
use Illuminate\Http\Request;

class CommandesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getCommandes(){

        $Commandes = commande::all();
        
        return response()->json([
            "Commandes"=>$Commandes,
            "status"=>"200, Kulchi Nadi",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
