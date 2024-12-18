<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PoemResource extends JsonResource
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
            'writer_id' => $this->writer_id,
            'dynasty' => $this->dynasty,
            'writer_name' => $this->writer,
            'title' => $this->title,
            'content' => $this->content,
            'remark' => $this->remark,
            'translation' => $this->translation,
            'shangxi' => $this->shangxi,
        ];
    }
}
