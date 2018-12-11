<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LinkResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'type' => $this->type ?: 'link',
            'url' => \route('direct', [$this->hash]),
            'qr' => \route('qr', [$this->hash]),
            'hash' => $this->hash,
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'icon' => $this->getIcon(),
            'tags' => $this->getTags(),
            'loaded' => !empty($this->parameters),
        ];
    }

}
