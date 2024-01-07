<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthApicontroller extends Controller
{
    
    use HttpResponses;
    public function register(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'address' => 'nullable|string',
        'tel' => 'nullable|string',
        'city' => 'nullable|string',
    ]);

    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']),
        'address' => $validatedData['address'],
        'tel' => $validatedData['tel'],
        'city' => $validatedData['city'],
        'role' => 'user', // Rôle par défaut pour l'inscription
    ]);
    $token = $user->createToken('authToken')->plainTextToken;
    return $this->success(
        ['message' => 'User registered successfully', 'user' => $user,'token' => $token]);
}




public function login(Request $request)

{
    
    $credentials = $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

     //Lorsque vous appelez Auth::attempt($credentials), Laravel vérifie si les identifiants correspondent à un utilisateur existant dans votre base de données. Les paramètres $credentials sont généralement un tableau associatif contenant les identifiants, tels que l'email et le mot de passe.
     $user = User::where('email', $credentials['email'])->first();

     if (!$user || !Hash::check($credentials['password'], $user->password)) {
         return response()->json(['message' => 'Invalid credentials'], 401);
     }
 
     // Authentification réussie, générez le jeton
     $token = $user->createToken('authToken')->plainTextToken;
 
        return $this->success([
            'message' => 'Login successful',
            'user' => $user,
            'token' => $token
        ]);
    
}

public function logout(Request $request)
{
    // Récupère l'utilisateur actuellement authentifié
    $user = Auth::user();

    // Révoque le token d'authentification actuel de l'utilisateur
    $user->currentAccessToken()->delete();

    return $this->success(['message' => 'User logged out successfully']);
}


}
