<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUser;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthApicontroller extends Controller
{
    
    use HttpResponses;
    public function register(RegisterUser $request)
{
    $user = new User();

    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->address = $request->address;
    $user->tel = $request->tel;
    $user->city = $request->city;

    $user->save();
    $token = $user->createToken('authToken')->plainTextToken;
    return response()->json([
        "Statut Code" => "200",
        'message' => 'User registered successfully', 'user' => $user,'token' => $token,
        "user"=>$user,
    ]);

}

//     public function register(Request $request)
// {
//     $validatedData = $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|string|email|max:255|unique:users',
//         'password' => 'required|string|min:8',
//         'address' => 'nullable|string',
//         'tel' => 'nullable|string',
//         'city' => 'nullable|string',
//     ]);

//     $user = User::create([
//         'name' => $validatedData['name'],
//         'email' => $validatedData['email'],
//         'password' => bcrypt($validatedData['password']),
//         'address' => $validatedData['address'],
//         'tel' => $validatedData['tel'],
//         'city' => $validatedData['city'],
//         'role' => 'user',
//     ]);
//     $token = $user->createToken('authToken')->plainTextToken;
//     return $this->success(
//         ['message' => 'User registered successfully', 'user' => $user,'token' => $token]);
// }




public function login(Request $request)

{
    
    $credentials = $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);
    $user = User::where('email', $credentials['email'])->first();

     //Lorsque vous appelez Auth::attempt($credentials), Laravel vérifie si les identifiants correspondent à un utilisateur existant dans votre base de données. Les paramètres $credentials sont généralement un tableau associatif contenant les identifiants, tels que l'email et le mo
    if (!$user || !Hash::check($credentials['password'], $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    // Authentification réussie, générez le jeton
    $token = $user->createToken('authToken')->plainTextToken;

    

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
    $user = $request->user();

    // Révoque tous les tokens d'authentification de l'utilisateur
    $user->tokens()->delete();

    return $this->success(['message' => 'User logged out successfully']);
}


}
