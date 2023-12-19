<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
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

    public function create(){
        try {
            $product = new Product();

            $product->title = 'Titre Test';
            $product->image = '0';
            $product->description = 'description Test';
            $product->price = 400;
            $product->save();
    
            return response()->json([
                "status"=>"200, Produit Ajouté avec succés",
                "product"=>$product,
            ]);       
        } 
        catch (\Throwable $th) {
            throw $th;
        }
      
    }
}
