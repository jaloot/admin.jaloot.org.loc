<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VerseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "number" => $this->number,
            "text" => $this->text,
            'text_simple' => $this->when(
                $request->boolean('text_simple'),
                $this->text_simple
            ),
            "line" => $this->line,
            "juz" => $this->juz,
            "page" => $this->page,
        ];
    }
}
