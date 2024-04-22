<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class reservationResource extends JsonResource
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
            "heure_debut"=>$this->heure_debut,
            "heure_fin"=>$this->heure_fin,
            "nbre_voyageurs"=>$this->nbre_voyageurs,
            "prix_total"=>$this->prix_total,
            "hote"=>UserResource::make($this->hote),
            "client"=>UserResource::make($this->client),
            "site"=>SiteResource::make($this->site)
        ];
    }
}
