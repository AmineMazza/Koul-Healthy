<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        
      
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('images_upload', $imageName, 'public');
                $images[] = $imageName;
            }
            // stocker les noms des fichiers d'images dans un format JSON dans la base de données.
            $product->image = json_encode($images); 
        }
        
        $product->save();

        return redirect()->route('products.index')->with('success', 'Produit créé avec succès');
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

        return redirect()->route('products.index')->with('success', 'Produit supprimé avec succès');
    }

}
