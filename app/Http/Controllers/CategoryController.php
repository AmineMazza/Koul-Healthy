<?php

namespace App\Http\Controllers;
use Exception; // Ajoutez cette ligne en haut du fichier
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Category; // Assurez-vous d'utiliser le modèle approprié

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::paginate(5);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
        $filename = '';

        if ($request->hasFile('image')) {
            $filename = asset('/assets/img/category/' . time() . '.' . $request->image->extension());
            $request->image->move(public_path('assets/img/category/'), $filename);
        } else {
            // Si aucune image n'est fournie, définissez un message d'erreur
            session()->flash('error', 'Veuillez sélectionner une image pour la catégorie.');
            
            // Redirection vers la vue des catégories
            return redirect()->route('categories.index');
        }

        // Utilisez la méthode create avec les attributs pour créer une nouvelle instance et l'insérer dans la base de données
        $category = Categorie::create([
            'titre' => $request->input('titre'), // Utilisez input pour récupérer la valeur du champ titre
            'image' => $filename,
        ]);

        // Catégorie ajoutée avec succès, définissez un message flash
        session()->flash('success', 'Catégorie ajoutée avec succès');

        // Redirigez l'utilisateur vers une autre page, par exemple la liste des produits
        return redirect()->route('categories.index')->with('success', 'Catégorie créée avec succès');
    } catch (Exception $e) {
        // En cas d'erreur, définissez un message flash d'erreur
        session()->flash('error', 'Une erreur s\'est produite lors de l\'ajout de la catégorie.');

        // Redirection vers la vue des catégories
        return redirect()->route('categories.index');
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Categorie::findOrFail($id);
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Categorie::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Categorie::findOrFail($id);
    
        // Validation des données
        $this->validate($request, [
            'titre' => 'required|string',
            'new_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Vous pouvez rendre l'image facultative
            // Ajoutez d'autres règles de validation au besoin
        ]);
    
        // Mise à jour des informations de la catégorie
        $filename = $category->image;
    
        if ($request->hasFile('new_image')) {
            // Supprimez l'ancienne image s'il y en a une
            if ($filename && file_exists(public_path($filename))) {
                unlink(public_path($filename));
            }
    
            $filename = '/assets/img/category/' . time() . '.' . $request->new_image->extension();
            $request->new_image->move(public_path('assets/img/category/'), $filename);
        }
    
        $category->update([
            'titre' => $request->titre,
            'image' => $filename,
            // Mettez à jour d'autres attributs au besoin
        ]);
        session()->flash('success', 'La catégorie a été mise à jour avec succès.');

        // Redirection vers la vue des catégories
        return redirect()->route('categories.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Categorie::findOrFail($id);
        $category->delete();

        session()->flash('success', 'La catégorie a été supprimé avec succès.');

        // Redirection vers la vue des catégories
        return redirect()->route('categories.index');
    }


public function bulkDelete(Request $request)
{
    $selectedCategories = $request->input('selectedCategories');

    if (!empty($selectedCategories)) {
        // suppression par ID categorie
        Categorie::whereIn('id', $selectedCategories)->delete();

        return redirect()->route('categories.index')->with('success', 'Catégories supprimées avec succès.');
    } else {
        return redirect()->route('categories.index')->with('error', 'Veuillez sélectionner au moins une catégorie à supprimer.');
    }
}


}
