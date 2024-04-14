<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiteResource extends JsonResource
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
            "prix"=>$this->prix,
            "localisation"=>$this->localisation,
            "longitude"=>$this->longitude,
            "latitude"=>$this->latitude,
            "hote"=>UserResource::make($this->hote)
        ];
    }
}
