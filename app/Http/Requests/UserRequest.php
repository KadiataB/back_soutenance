<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

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
            'role' => 'sometimes|in:client,admin',
            'password' => 'required|string|min:8',
            'description' => 'required'
        ];
    }

    public function messages(){
        return [
            "nom.required" => " Le champ nom est obligatoire\n",
            "prenom.required" => " Le champ prenom est obligatoire",
            "CNI.required" => " Le champ CNI est obligatoire",
            "email.required" => " Le champ email est obligatoire",
            "password.required" => " Le champ password est obligatoire",
            "description.required" => " Le champ description est obligatoire",
            "num_tel.required" => " Le champ num_tel est obligatoire",
        ];
        
    }

    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->all();
        $message = implode(', ', $errors);
        throw new HttpResponseException(
         response()->json($message,Response::HTTP_BAD_REQUEST)
        );
    }

}
