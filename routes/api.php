<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\AuthApicontroller;
use App\Http\Controllers\Api\CommandesController;
use App\Http\Controllers\Api\LineCommandesController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware'=>['auth:sanctum']] ,function() {
    Route::post("/logout", [AuthApiController::class,"logout"]);
});

//route vers auth API(login et register)
Route::post('/register',[AuthApicontroller::class,"register"]);
Route::post('/login',[AuthApicontroller::class,"login"]);


Route::group(['middleware'=>['auth:sanctum']] ,function() {

    // Pour recuperer la liste des produits :
    Route::get("/products",[ProductController::class,"getProduct"])->name("products");
    // Creer un produit :
    Route::post('/products/create', [ProductController::class,'create']);

    // Modifier un produit :
    Route::put('/products/edit/{id}', [ProductController::class,'update']);



    //liste des categories
    Route::get('/categories', [CategoryController::class, 'getCategories'])->name("categories");

    // Endpoint pour créer une nouvelle catégorie
    Route::post('/categories/create', [CategoryController::class, 'create']);
    
    // Endpoint pour mettre à jour une catégorie existante
    Route::put('/categories/update/{id}', [CategoryController::class, 'update']);

    // Pour recuperer la liste des commandes :
        Route::get("/commandes",[CommandesController::class,"getCommandes"])->name("commandes");
    // Creer un commandes :
        Route::post('/commande/create', [CommandesController::class,'create']);
    // Modifier un commandes :
        Route::put('/commandes/edit/{id}', [CommandesController::class,'update']);

    // Pour recuperer la liste des LineCommande :
        Route::get("/LineCommandes",[LineCommandesController::class,"getLineCommandes"])->name("Linecommandes");
    // Creer un LineCommande :
        Route::post('/LineCommande/create', [LineCommandesController::class,'create']);
    // Modifier un LineCommande :
        Route::put('/LineCommande/edit/{id}', [LineCommandesController::class,'update']);
    
    // Pour Logout :
        Route::post('/logout', [AuthApiController::class,"logout"]);


     Route::get('/user', function (Request $request) {
        return $request->user();
    });
     
});



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
   
// });
