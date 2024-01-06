<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LineCommande;
use Exception;
use Illuminate\Http\Request;

class LineCommandesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getLineCommandes(){

        $LineCommandes = LineCommande::all();
        
        return response()->json([
            "LineCommandes"=>$LineCommandes,
            "status"=>"200, Kulchi Nadi",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request){
        try {
            $LineCommande = new LineCommande();

            $LineCommande->qte_commandée = $request->qte_commandée;
            $LineCommande->Price_total_commande = $request->Price_total_commande;
            $LineCommande->produit_id  = $request->produit_id ;
            $LineCommande->commande_id = $request->commande_id ;

            $LineCommande->save();
    
            return response()->json([
                "status"=>"200, LineCommande Ajouté avec succés.",
                "data"=>$LineCommande,
            ]);       
        } 
        catch (Exception $e) {
            return response()->json($e) ;
        }
      
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
