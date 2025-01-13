<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SigninRequest extends FormRequest
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
            'firstname' => 'required|string|max:40',
            'lastname' => 'required|string|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'sexe' => 'required|in:Masculin,Feminin',
            'filiere' => 'required',
            'birthday' => 'required|date',
            'telephone' => 'required|string|min:8|max:15|unique:users,telephone',
        ];

    }

    public function messages()
    {
        return [
            'firstname.required' => 'Le champ nom est requis.',
            'firstname.string' => 'Le prénom doit être une chaîne de caractères.',
            'firstname.max' => 'Le prénom ne peut pas dépasser 40 caractères.',

            'lastname.required' => 'Le champ prénom est requis.',
            'lastname.string' => 'Le nom doit être une chaîne de caractères.',
            'lastname.max' => 'Le nom ne peut pas dépasser 40 caractères.',

            'sexe.required' => 'Le sexe est requis.',
            'sexe.in' => 'Le sexe doit être soit "Masculin" soit "Féminin".',

            'email.required' => 'L\'adresse email est requise.',
            'email.email' => 'Veuillez entrer une adresse email valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',

            'filiere.required' => 'La filiere est requis.',

            'birthday.required' => 'La date de naissance est requise.',
            'birthday.date' => 'Veuillez entrer une date valide.',

            'password.required' => 'Le mot de passe est requis.',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',

            'telephone.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
            'telephone.min' => 'Le numéro de téléphone doit contenir au moins 8 caractères.',
            'telephone.max' => 'Le numéro de téléphone ne peut pas dépasser 15 caractères.',
            'telephone.unique' => 'Ce numéro de téléphone est déjà utilisé.',

        ];
    }
}
