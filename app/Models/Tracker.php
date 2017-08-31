<?php

namespace App\Models;

use Bavix\Gearman\Client;
use Bavix\Helpers\JSON;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class Tracker extends Model
{

    protected $table      = 'trackers';
    public    $timestamps = false;

    protected static $_hit;
    protected static $_host;
    protected static $_online;

    protected static $bots = [
        'bavix' // remove self-bot
//        'partners',
//        'robots?',
//        'archiver',
//        'externalhit',
//        'spider',
//        'yahoo',
//        'slurp',
//        'snippet',
//        'Google',
//        'Yandex',
//        'curl',
//        'wget',
//        'bots?'
    ];

    public static function visits()
    {
        return static::query()
            ->where('url', request()->getPathInfo())
            ->count();
    }

    protected static function isHit()
    {
        $time    = microtime(true);
        $newTime = $time + 0.6; // remove n-e hits

        $save = $time > session('time', 0);

        request()->session()->put(
            'time',
            $newTime
        );

        return $save;
    }

    public static function graphHost()
    {
        return static::query()
            ->select(
                DB::raw('sum(1) `res`'),
                DB::raw('DATE_FORMAT(`fdate`, "%m.%Y") `month`')
            )
            ->from(
                DB::raw('(' . static::query()
                        ->select(
                            'ip',
                            DB::raw('DATE_FORMAT(`created_at`, "%Y-%m-01") `fdate`')
                        )
                        ->where(
                            DB::raw('DATE(created_at)'),
                            '>',
                            DB::raw('DATE_SUB(CURDATE(), INTERVAL 6 MONTH)')
                        )
                        ->groupBy('fdate', 'ip')
                        ->toSql() . ') a')
            )
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();
    }

    public static function graphHit()
    {
        return static::query()
            ->select(
                DB::raw('sum(1) `res`'),
                DB::raw('DATE_FORMAT(`created_at`, "%m.%Y") `month`')
            )
            ->where(
                DB::raw('DATE(created_at)'),
                '>',
                DB::raw('DATE_SUB(CURDATE(), INTERVAL 6 MONTH)')
            )
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();
    }

    /**
     * add hit
     */
    public static function hit(Link $link = null)
    {
        $req = request();

        if (!$req->ajax() && $req->isMethod('GET') && static::isHit())
        {
            if ($req->headers->has('User-Agent'))
            {
                $route = $req->route();

                $userAgent = $req->headers->get('User-Agent');

                // popular bot -- skip
                if (!preg_match('~(' . implode('|', static::$bots) . ')~i', $userAgent))
                {
                    $model             = new static();
                    $model->ip         = $req->ip();
                    $model->url        = $req->getPathInfo();
                    $model->parameters = JSON::encode([
                        'attributes' => $route->parameters(),
                        'userAgent'  => $userAgent,
                        'language'   => $req->getPreferredLanguage(),
                        'referer'    => $req->headers->get('referer'),
                        'route'      => $route->getName(),
                        'link_id'    => $link ? $link->id : null
                    ]);

                    // without mysql-trigger
                    $model->created_at = date('Y-m-d H:i:s');

                    try
                    {
                        $client = new Client();
                        $client->addServer(
                            config('gearman.host'),
                            config('gearman.port')
                        );

                        $client->doLowBackground('tracker', serialize($model));
                    }
                    catch (\Throwable $throwable)
                    {
                    }
                }
            }
        }
    }

    /**
     * @return Builder
     */
    protected static function buildQuery()
    {
        return static::query()
            ->where(
                DB::raw('DATE(`created_at`)'),
                DB::raw('CURRENT_DATE')
            );
    }

    /**
     * @return int
     */
    public static function hostAllCount()
    {
        return static::query()
            ->from(
                DB::raw('(' . static::query()
                        ->select(DB::raw('`ip`'))
                        ->groupBy(DB::raw('DATE(`created_at`)'), 'ip')
                        ->toSql() . ') a')
            )->count();
    }

    /**
     * @return int
     */
    public static function hitAllCount()
    {
        return static::query()->count();
    }

    /**
     * @return int
     */
    public static function hitCount()
    {
        if (static::$_hit === null)
        {
            static::$_hit = static::buildQuery()->count();
        }

        return static::$_hit;
    }

    /**
     * @return int
     */
    public static function hostCount()
    {
        if (static::$_host === null)
        {
            static::$_host = static::buildQuery()
                ->select('ip')
                ->groupBy('ip')
                ->get()
                ->count();
        }

        return static::$_host;
    }

    /**
     * @return int
     */
    public static function onlineCount()
    {
        if (static::$_online === null)
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
