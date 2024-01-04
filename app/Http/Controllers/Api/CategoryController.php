<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest; // Assurez-vous d'avoir le fichier de demande approprié
use App\Http\Requests\EditCategoryRequest; // Assurez-vous d'avoir le fichier de demande approprié
use App\Models\Categorie; // Assurez-vous d'utiliser le modèle approprié
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategories()
    {
        $categories = Categorie::all();
        return response()->json([
            "categories" => $categories,
            "status" => "200, Liste des catégories récupérée avec succès",
        ]);
    }

    public function create(CreateCategoryRequest $request)
    {
        try {
            $category = new Categorie();

            $category->titre = $request->titre;
            $category->image = $request->image;

            $category->save();

            return response()->json([
                "status" => "200, Catégorie ajoutée avec succès",
                "data" => $category,
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function update(EditCategoryRequest $request, $id)
    {
        $category = Categorie::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'Catégorie non trouvée',
            ], 404);
        }

        $category->titre = $request->titre;
        $category->image = $request->image;

        $category->save();

        return response()->json([
            'status' => '200, Catégorie mise à jour avec succès',
            'data' => $category,
        ]);
    }
}
