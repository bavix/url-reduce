<?php

namespace App\Models;

use Bavix\Helpers\Str;
use Illuminate\Database\Eloquent\Model;

class Qr extends Model
{

    protected $table = 'qr';

    public $timestamps = false;

    public function shorter($func = __FUNCTION__)
    {
        return route($func, [
            'hash' => $this->hash
        ]);
    }

    public function qr()
    {
        return $this->shorter(__FUNCTION__);
    }

    public static function findByUrl($url)
    {
        $model = static::query()
            ->where('url', $url)
            ->first();

        if (null === $model)
        {
            $model       = new static();
            $model->url  = $url;
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
