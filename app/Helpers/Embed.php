<?php

namespace App\Helpers;

use Embed\Http\DispatcherInterface;

class Embed
{

    /**
     * @param string $url
     * @param array|null $config
     * @param DispatcherInterface|null $dispatcher
     * @return array
     */
    public static function getMeta(string $url, ?array $config = null, ?DispatcherInterface $dispatcher = null): array
    {
        $info = \Embed\Embed::create($url, $config, $dispatcher);

        return [
            'title'         => $info->title,
            'description'   => $info->description,
            'url'           => $info->url,
            'type'          => $info->type,
            'tags'          => $info->tags,
            'images'        => $info->images,
            'image'         => $info->image,
            'imageWidth'    => $info->imageWidth,
            'imageHeight'   => $info->imageHeight,
            'code'          => $info->code,
            'width'         => $info->width,
            'height'        => $info->height,
            'aspectRatio'   => $info->aspectRatio,
            'authorName'    => $info->authorName,
            'authorUrl'     => $info->authorUrl,
            'providerName'  => $info->providerName,
            'providerUrl'   => $info->providerUrl,
            'providerIcons' => $info->providerIcons,
            'providerIcon'  => $info->providerIcon,
            'publishedDate' => $info->getPublishedTime(),
            'license'       => $info->getLicense(),
            'linkedData'    => $info->getLinkedData(),
            'feeds'         => $info->getFeeds(),
        ];
    }

}
