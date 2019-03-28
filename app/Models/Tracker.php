<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{

    /**
     * disable updated at
     */
    const UPDATED_AT = null;

    /**
     * @param null|Link $link
     * @return Tracker|null
     */
    public static function hit(?Link $link = null): ?self
    {
        if (request()->method() !== 'GET') {
            return null;
        }

        if (request()->ajax() || request()->pjax()) {
            return null;
        }

        $route = request()->route();

        $model = new static();
        $model->ip = request()->getClientIp();
        $model->url = request()->getPathInfo();
        $model->parameters = \json_encode([
            'attributes' => $route->parameters(),
            'userAgent' => request()->userAgent(),
            'language' => request()->getPreferredLanguage(),
            'referer' => request()->headers->get('referer'),
            'route' => $route->getName(),
            'link_id' => $link ? $link->id : null
        ]);

        $model->save();
        return $model;
    }

}
