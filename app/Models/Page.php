<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table      = 'pages';
    public    $timestamps = false;

    /**
     * @param $uri
     *
     * @return mixed
     */
    public static function findByFriendly($uri)
    {
        return static::query()
            ->where('friendly_url', $uri)
            ->first();
    }

}
