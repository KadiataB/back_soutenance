<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class mediasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "site" => SiteResource::make($this->site),
            // "prix"=>$this->site->prix,
            // "localisation"=>$this->site->localisation,
            // "latitude"=>$this->site->latitude,
            // "longitude"=>$this->site->longitude,
            "medias" => $this->path
        ];
    }
}
