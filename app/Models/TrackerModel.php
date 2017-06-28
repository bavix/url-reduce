<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TrackerModel extends Model
{

    protected $table = 'trackers';
    public $timestamps = false;

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
        return static::buildQuery()->count();
    }

    public static function hostCount()
    {
        return static::buildQuery()
            ->select('ip')
            ->groupBy('ip')
            ->get()
            ->count();
    }


    public static function onlineCount()
    {
        return static::query()
            ->select('ip')
            ->groupBy('ip')
            ->where(
                'created_at',
                '>',
                DB::raw('DATE_SUB(NOW(), INTERVAL -15 MINUTE)')
            )
            ->get()
            ->count();
    }

}
