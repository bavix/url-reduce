<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class LinkResource
 * @package App\Http\Resources
 * @property-read string $hash
 * @property-read array $parameters
 * @method string getTitle()
 * @method string getDescription()
 * @method string getIcon()
 * @method array getTags()
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
            'type' => $this->type ?: 'link',
            'url' => \route('direct', [$this->hash]),
            'qr' => \route('qr', [$this->hash]),
            'hash' => $this->hash,
            'title' => $this->getTitle() ?: 'Unknown',
            'description' => $this->getDescription(),
            'icon' => $this->getIcon(),
            'tags' => $this->getTags(),
            'loaded' => !empty($this->parameters),
        ];
    }

}
