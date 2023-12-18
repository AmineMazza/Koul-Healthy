<?php

use App\Http\Controllers\CommandeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::get('/', [HomeController::class,'index'])->name('home.index');

Route::get('/products', [ProductController::class,'index'])->name('products.index');
// Route::get('/products/create', [ProductController::class,'create'])->name('products.create');

Route::get('/commandes', [CommandeController::class,'index'])->name('commandes.index');

// Pour recuperer la liste des utilisateurs :
Route::get("/users",[UserController::class,"getUser"])->name("users");


