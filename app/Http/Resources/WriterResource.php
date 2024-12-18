<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WriterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'avatar' => $this->avatar2,
            'dynasty' => $this->dynasty,
            'simple_intro' => $this->simple_intro,
            'detail_intro' => json_decode($this->detail_intro2, true),
        ];
    }
}
