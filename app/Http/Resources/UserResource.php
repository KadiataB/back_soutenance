<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "nom"=>$this->nom,
            "prenom"=>$this->prenom,
            "num_tel"=>$this->num_tel,
            "email"=>$this->email,
            "CNI"=>$this->CNI,
            "password"=>$this->password,
            "description"=>$this->description
        ];
    }
}
