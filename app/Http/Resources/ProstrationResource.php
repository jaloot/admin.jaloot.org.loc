<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProstrationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'verse_number' => $this->verse?->number,
            'recommended' => $this->recommended,
            'obligatory' => $this->obligatory,
        ];
    }
}