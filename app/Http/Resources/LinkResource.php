<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class LinkResource
 * @package App\Http\Resources
 * @property-read string $type
 * @property-read string $title
 * @property-read string $description
 * @property-read string $icon
 * @property-read string $hash
 * @property-read array $tags
 * @property-read array $parameters
 */
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
            'type' => $this->type,
            'url' => \route('direct', [$this->hash]),
            'qr' => \route('qr', [$this->hash]),
            'hash' => $this->hash,
            'title' => $this->title ?: 'Unknown',
            'description' => $this->description,
            'icon' => $this->icon,
            'tags' => $this->tags,
            'loaded' => !empty($this->parameters),
        ];
    }

}
