<?php

namespace App\Models;

use Bavix\Helpers\JSON;
use Bavix\Helpers\Str;
use Illuminate\Database\Eloquent\Model;

/**
 * @SWG\Definition()
 */
class Link extends Model
{
    protected $table   = 'links';

    public $timestamps = false;

    /**
     * @SWG\Property(
     *   property="url",
     *   type="string",
     *   description="URL"
     * )
     */

    /**
     * @param $hash
     *
     * @return mixed
     */
    public static function findByHash($hash)
    {
        return static::query()
            ->where('hash', $hash)
            ->first();
    }

    public static function findByUrl($url)
    {
        return static::query()
            ->where('url', $url)
            ->first();
    }

    public static function hashUnique()
    {
        while (static::findByHash($hash = Str::random(5)))
        {
            continue;
        }

        return $hash;
    }

    public static function addUrl($url)
    {
        $model = self::findByUrl($url);

        if (!$model)
        {
            $model             = new static();
            $model->parameters = JSON::encode(null);
            $model->hash       = static::hashUnique();
            $model->url        = $url;
            $model->active     = 1;

            $model->save();
        }

        return $model;
    }

}
