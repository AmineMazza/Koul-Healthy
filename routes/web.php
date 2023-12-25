<?php

use App\Http\Controllers\CommandeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/dashboard', function () {
//     return view('welcome');
// });

// Route::get('/Product', function () {
//     return view('Product');
// });

Route::get('/dashboard', [HomeController::class,'index'])->middleware('admin')->name('home.index');

Route::get('/', [HomeController::class,'login']);
Route::get('/register', [HomeController::class,'register']);
Route::post('/vregister', [HomeController::class,'vregister']);
Route::post('/vlogin', [HomeController::class,'valogin']);
Route::post('/logout', [HomeController::class, 'logout'])->middleware('admin')->name('logout');

Route::resource('products',ProductController::class);
Route::get('/products', [ProductController::class,'index'])->name('products.index');
Route::get('/products/create', [ProductController::class,'create'])->name('product.create');
Route::post('/products/store', [ProductController::class,'store'])->name('product.store');
Route::get('/product/{id}', [ProductController::class,'show'])->name('product.show');
Route::get('/product/{id}/edit', [ProductController::class,'edit'])->name('product.edit');
Route::get('/product/{id}/update', [ProductController::class,'update'])->name('product.update');
Route::get("/products/{id}/delete", [ProductController::class,'destroy'])->name('product.delete');



// Route pour afficher la liste des catégories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

// Route pour afficher le formulaire de création de catégorie
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

// Route pour stocker une nouvelle catégorie
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

// Route pour afficher les détails d'une catégorie
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

// Route pour afficher le formulaire d'édition d'une catégorie
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

// Route pour mettre à jour une catégorie
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');

// Route pour supprimer une catégorie
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');



Route::get('/commandes', [CommandeController::class,'index'])->name('commandes.index');

// Pour recuperer la liste des utilisateurs :
Route::get("/users",[UserController::class,"getUser"])->name("users");


