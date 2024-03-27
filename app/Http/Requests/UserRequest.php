<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'num_tel' => 'required|string|unique:users|max:255',
            'CNI' => 'required|string|unique:users|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'role' => 'required|in:hote,client,admin',
            'password' => 'required|string|min:8',
            'description' => 'string'
        ];
    }

    public function messages(){
        return [
            "nom.required" => " Le champ nom est obligatoire"
        ];
    }
}
