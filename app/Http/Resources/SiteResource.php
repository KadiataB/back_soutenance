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
            "id"=> $this->id,
            "hote_id"=> $this->hote_id,
            "localisation"=> $this->localisation,
            "prix"=> $this->prix,
            "latitude"=> $this->latitude,
            "longitude"=> $this->longitude,
            "medias"=>$this->medias
        ];
    }
}
