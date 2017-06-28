<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TrackerModel extends Model
{

    protected $table = 'trackers';
    public $timestamps = false;

    protected static $_hit;
    protected static $_host;
    protected static $_online;

    public static function hit()
    {
        $req = request();
        if (!$req->ajax() && $req->isMethod('GET'))
        {
            $model           = new static();
            $model->ip       = $req->ip();
            $model->url      = $req->getPathInfo();
            $model->referer = $req->headers->get('referer');
            $model->language = $req->getPreferredLanguage();

            $model->save();
        }
    }

    protected static function buildQuery()
    {
        return static::query()
        ->where(
            DB::raw('DATE(`created_at`)'),
            DB::raw('CURRENT_DATE')
        );
    }

    public static function hitCount()
    {
        if (!static::$_hit)
        {
            static::$_hit = static::buildQuery()->count();
        }

        return static::$_hit;
    }

    public static function hostCount()
    {
        if (!static::$_host)
        {
            static::$_host = static::buildQuery()
                ->select('ip')
                ->groupBy('ip')
                ->get()
                ->count();
        }

        return static::$_host;
    }


    public static function onlineCount()
    {
        if (!static::$_online)
        {
            static::$_online = static::query()
                ->select('ip')
                ->groupBy('ip')
                ->where(
                    'created_at',
                    '>',
                    DB::raw('DATE_SUB(NOW(), INTERVAL 15 MINUTE)')
                )
                ->get()
                ->count();
        }

        return static::$_online;
    }

}
