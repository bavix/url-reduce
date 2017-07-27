<?php

namespace App\Models;

use Bavix\Helpers\JSON;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class GeoIP extends Model
{
    // from, to
    protected $table      = 'geo_ips';
    public    $timestamps = false;

    protected static $ips = [];

    protected static function freeGeoIP($ip)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://freegeoip.net/json/' . $ip);
        curl_setopt($ch, CURLOPT_ACCEPT_ENCODING, 'UTF-8');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);
        $code     = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        return $code > 199 && $code < 300 ? JSON::decode($response) : null;
    }

    protected static function loadFromIP($ip)
    {
        $data = static::freeGeoIP($ip);

        if (!$data)
        {
            return $data;
        }

        unset($data['ip'], $data['metro_code']);
        $data['from'] = ip2long($ip);
        $data['to']   = ip2long($ip);

        $data = array_map(function ($item) {
            return empty($item) ? null : $item;
        }, $data);

        return static::query()
            ->forceCreate($data);
    }

    protected static function detection($ip)
    {
        $long = ip2long($ip);

        if (!isset(static::$ips[$long]))
        {
            static::$ips[$long] = null;

            if ($long)
            {
                // if IPv6 -- skip
                static::$ips[$long] = static::query()
                    ->whereRaw('? BETWEEN `from` AND `to`', [$long])
                    ->first();

                if (static::$ips[$long] === null)
                {
                    static::$ips[$long] = self::loadFromIP($ip);
                }
            }
        }

        return static::$ips[$long];
    }

    protected static function _getLanguage(Request $request, $ip)
    {
        $languages = bxCfg('bx.languages', ['en', 'ru']);

        $model = static::detection($ip);

        if ($model)
        {
            $code = strtolower($model->country_code);

            if (in_array($code, $languages, true))
            {
                return $code;
            }
        }

        return $request->getPreferredLanguage($languages);
    }

    public static function getLanguage(Request $request = null)
    {
        $request = $request ?: \request();
        $ip        = $request->ip();
        $key = 'locale' . $ip;

        if (!Cache::has($key))
        {
            Cache::put(
                $key,
                $locale = static::_getLanguage($request, $ip),
                Carbon::now()->addMonth()
            );

            return $locale;
        }

        return Cache::get($key);
    }

}
