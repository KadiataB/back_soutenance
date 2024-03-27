<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'date_debut' => 'required|date|date_format:Y-m-d',
            'date_fin' => 'required|date|date_format:Y-m-d|after_or_equal:date_debut',
            'client_id' => 'required|exists:users,id',
            'hote_id' => 'required|exists:users,id',
            'nbre_voyageurs' => 'required|integer|min:1',
            'site_id' => 'required|exists:sites,id',
        ];
    }
}
