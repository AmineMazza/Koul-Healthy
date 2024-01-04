<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;



class RegisterUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'address' => 'required',
            'tel' => 'required',
            'city' => 'required',
            'role' => 'user', 
        ];
    }

    public function failedValidation(Validator $validator){
        
        throw new HttpResponseException(response()->json(
            [
                'seccess' => false,
                'error' => true,
                'message' => 'Erreur de validation',
                'errorsList' => $validator->errors()
            ]
        ));   
    }
    public function messages()
    {
        return [
            'name.required' => 'Le nom doit etre fourni',
            'email.required' => 'Une adresse mail doit etre fourni',
            'email.unique' => 'Cette adresse mail existe déja',
            'password.required' => 'Le mot de passe est requis',
            'address.required' => 'Votre adresse doit etre fourni',
            'tel.required' => 'Numero de Telephone doit etre fourni',
            'city.required' => 'la ville doit etre fourni',
        ];
    }
}
