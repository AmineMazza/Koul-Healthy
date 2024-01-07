<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class ProductController extends Controller
{   

    public function getProduct(){

        $products = Product::all();
        
        return response()->json([
            "products"=>$products,
            "status"=>"200, Kulchi Nadi",
        ]);
    }

    public function create(CreateProductRequest $request){
        try {
            $product = new Product();

            // $product->title = 'Titre Test';
            // $product->image = '0';
            // $product->description = 'description Test';
            // $product->price = 500;

            $product->title = $request->title;
            $product->image = $request->image;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->category_id = $request->category_id;

            $product->save();
    
            return response()->json([
                "status"=>"200, Produit Ajouté avec succés.",
                "data"=>$product,
            ]);       
        } 
        catch (Exception $e) {
            return response()->json($e) ;
        }
      
    }

    public function store(Request $request): JsonResponse
{
    try {
        $filename = '';

        if ($request->hasFile('image')) {
            $filename = '/assets/img/products/' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img/products/'), $filename);
        }

        // Utilisez la méthode create avec les attributs pour créer une nouvelle instance et l'insérer dans la base de données
        $product = Product::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category_id'),
            'price' => $request->input('price'),
            'image' => $filename,
        ]);

        // Produit ajouté avec succès, retournez une réponse JSON
        return response()->json([
            'status' => 'success',
            'message' => 'Produit ajouté avec succès',
            'data' => $product,
        ], 201); // 201 Created

    } catch (\Exception $e) {
        // En cas d'erreur, retournez une réponse JSON avec un message d'erreur
        return response()->json([
            'status' => 'error',
            'message' => 'Une erreur s\'est produite lors de l\'ajout du produit.',
        ], 500); // 500 Internal Server Error
    }
}


    public function update(EditProductRequest $request, $id)
{
    try {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found.'], 404);
        }

        $product->title = $request->title;
        $product->image = $request->image;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        $product->save();

        return response()->json([
            "status" => "200, Product updated successfully",
            "data" => $product,
        ]);
    } catch (Exception $e) {
        return response()->json(['error' => 'An error occurred while updating the product.'], 500);
    }
      
    }
}
