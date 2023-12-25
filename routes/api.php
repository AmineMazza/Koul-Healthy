<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\AuthApicontroller;
use App\Http\Controllers\UserController;


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
Route::post("/register",[AuthApicontroller::class,"register"]);
Route::post("/login",[AuthApicontroller::class,"login"]);

// Pour recuperer la liste des produits :
Route::get("/products",[ProductController::class,"getProduct"])->name("products");

// Creer un produit :
Route::post('/products/create', [ProductController::class,'create']);

// Modifier un produit :
Route::put('/products/edit/{id}', [ProductController::class,'update']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    //liste des categories
    Route::get('/categories', [CategoryController::class, 'getCategories'])->name("categories");

// Endpoint pour créer une nouvelle catégorie
Route::post('/categories/create', [CategoryController::class, 'create']);

// Endpoint pour mettre à jour une catégorie existante
Route::put('/categories/update/{id}', [CategoryController::class, 'update']);

});
