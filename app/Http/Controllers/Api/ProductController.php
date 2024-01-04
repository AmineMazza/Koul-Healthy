<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

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

            $product->save();
    
            return response()->json([
                "status"=>"200, Produit Ajouté avec succés",
                "data"=>$product,
            ]);       
        } 
        catch (Exception $e) {
            return response()->json($e) ;
        }
      
    }

    public function update(EditProductRequest $request, $id){
        try {
            $product = Product::find($id);

            $product->title = $request->title;
            $product->image = $request->image;
            $product->description = $request->description;
            $product->price = $request->price;
    
            $product->save();
    
            return response()->json([
                "status"=>"200, Produit Modifié avec succés",
                "data"=>$product,
            ]);       
        } 
        catch (Exception $e) {
            return response()->json($e) ;
        }
      
    }
}
