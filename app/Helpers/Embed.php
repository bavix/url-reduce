<?php

namespace App\Helpers;

use Embed\Http\DispatcherInterface;

class Embed
{

    public static function read($url, array $config = null, DispatcherInterface $dispatcher = null)
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
            'publishedDate' => $info->publishedDate,
            'license'       => $info->license,
            'linkedData'    => $info->linkedData,
            'feeds'         => $info->feeds,
        ];
    }

}
