<?php

namespace App\Http\Controllers;
use App\Models\categorie;
use App\Models\Product;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\GerantAdmin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class HomeController extends Controller
{
    public function index()
    {
        $categoriesStats = DB::table('categories')
        ->leftJoin('products', 'categories.id', '=', 'products.category_id')
        ->select(
            'categories.id as category_id',
            'categories.titre as category_name',
            DB::raw('count(products.id) as product_count')
        )
        ->groupBy('categories.id', 'categories.titre')
        ->get();
        
    return view('welcome', ['categoriesStats' => $categoriesStats]);    }


     public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }
   
    public function vregister(Request $request){
       $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:gerant_admins',
        'password' => 'required|string|min:8',
    ]);

    if (($validator->fails())) {
        
        //dd($validator->errors()->all());
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // ... votre code de création d'utilisateur

    // Ajoutez un message flash
   

    // Si la validation réussit, créez un nouvel utilisateur
    $isAdminEmail = $request->input('email') === 'admin@healthy.com'; // Email de l'administrateur
    $isAdminPassword = $request->input('password') === '19961986'; // Remplacer par le mot de passe de l'administrateur

    $role = $isAdminEmail && $isAdminPassword ? 'admin' : 'gerant'; // Déterminer le rôle
   
    $user = GerantAdmin::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
        'role' => $role, // Enregistrer le rôle de l'utilisateur
    ]);

    //return redirect('login')->withErrors($validator, 'login');
    return redirect('/')->with(['email' => $request->input('email'), 'message' => 'Registration successful! Please log in.']);
    }

    

    public function valogin(Request $request) {

     $credentials = $request->only('email', 'password');
    
    if (Auth::guard('gerants')->attempt($credentials)) {
            $request -> session()->regenerate();
            // Authentification réussie, rediriger vers la page de dashboard par défaut
            return redirect('/dashboard')->with('success', 'Login successful!');

        }else{
            return redirect('/')->withInput($request->only('email'))
            ->with('error', 'Invalid credentials. Please try again.');
        }

        // Si l'authentification échoue, rediriger vers la page de login avec un message d'erreur
       
    
    }

    public function logout(){
        Auth::guard('gerants')->logout();
        return redirect('/')->with('success', 'You have been logged out.');
    }

}
