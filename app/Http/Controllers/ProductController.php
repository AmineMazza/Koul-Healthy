<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //pour afficher juste 5 elements par page :
        // $products = Product::paginate(10);

        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = categorie::all();
        return view('products.create', ['categories' => $categories]);

    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        try {
            $filename = '';
    
            if ($request->hasFile('image')) {
                $filename = '/assets/img/products/' . time() . '.' . $request->image->extension();
                $request->image->move(public_path('assets/img/products/'), $filename);
            }
        
            // Utilisez la méthode create avec les attributs pour créer une nouvelle instance et l'insérer dans la base de données
            $product = Product::create([
                'title' => $request->input('title'), // Utilisez input pour récupérer la valeur du champ titre
                'description' => $request->input('description'), // Utilisez input pour récupérer la valeur du champ titre
                'category_id' => $request->input('category_id'),
                'price' => $request->input('price'), // Utilisez input pour récupérer la valeur du champ titre
                'image' => $filename,
            ]);
    
            // Produit ajouté avec succès, définissez un message flash
            session()->flash('success', 'Produit ajouté avec succès');
    
            // Redirigez l'utilisateur vers une autre page, par exemple la liste des produits
            return redirect()->route('products.index')->with('success', 'Produit créé avec succès');

        } catch (Exception $e) {
            // En cas d'erreur, définissez un message flash d'erreur
            session()->flash('error', 'Une erreur s\'est produite lors de l\'ajout du produit.');
    
            // Redirigez l'utilisateur vers une autre page, par exemple la page d'ajout de produit
            return redirect()->route('products.create');
        }
        // Redirection vers la vue des catégories
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'image' =>'image',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);
        $product = Product::find($id);
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Produit modifié avec succès');
    }


    public function update2(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
    
        // Validation des données
        $this->validate($request, [
            'titre' => 'required|string',
            'new_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Vous pouvez rendre l'image facultative
            // Ajoutez d'autres règles de validation au besoin
        ]);
    
        // Mise à jour des informations de la catégorie
        $filename = $product->image;
    
        if ($request->hasFile('new_image')) {
            // Supprimez l'ancienne image s'il y en a une
            if ($filename && file_exists(public_path($filename))) {
                unlink(public_path($filename));
            }
    
            $filename = '/assets/img/products/' . time() . '.' . $request->new_image->extension();
            $request->new_image->move(public_path('assets/img/products/'), $filename);
        }
    
        $product->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $filename,
            // Mettez à jour d'autres attributs au besoin
        ]);
    
        // Redirection vers la vue des catégories
        return redirect()->route('products.index')->with('success', 'Produit mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        // return view('products.delete', compact('product'));
        $product->delete();

        return redirect()->route('products.index')->with('error', 'Produit supprimé avec succès');
    }

}
