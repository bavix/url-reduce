<?php

namespace App\Models;

use Bavix\Helpers\Str;
use Illuminate\Database\Eloquent\Model;

class QrModel extends Model
{

    protected $table = 'qr';

    public $timestamps = false;

    public static function findByUrl($url)
    {
        $model = static::query()
            ->where('url', $url)
            ->first();

        if (null === $model)
        {
            $model = new static();
            $model->url = $url;
            $model->hash = Str::random(8);
            $model->save();
        }

        return $model;
    }

    public static function findByHash($hash)
    {
        return static::query()
            ->where('hash', $hash)
            ->first();
    }

}