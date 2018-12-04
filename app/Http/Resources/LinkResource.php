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
        $parameters = (array)$this->parameters;

        return [
            'type' => $this->type ?: 'link',
            'hash' => $this->hash,
            'title' => \array_get($parameters, 'title'),
            'description' => \array_get($parameters, 'description'),
            'icon' => \array_get($parameters, 'providerIcon'),
            'tags' => \array_get($parameters, 'tags', []),
            'loaded' => !empty($parameters),
        ];
    }

}
