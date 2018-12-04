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
        $parameters = (object)($this->parameters ?? []);

        return [
            'type' => $this->type ?: 'link',
            'hash' => $this->hash,
            'title' => $parameters->title,
            'description' => $parameters->description,
            'icon' => $parameters->providerIcon,
            'tags' => (array)$parameters->tags,
            'loaded' => (bool)$this->parameters,
        ];
    }

}
