<?php

namespace App\Models;

use App\Observers\LinkObserver;
use Bavix\Helpers\JSON;
use Bavix\Helpers\Str;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @SWG\Definition()
 */
class Link extends Model
{
    protected $table   = 'links';

    public $timestamps = false;

    public function updateMetadata()
    {
        if (!$this->updated_at)
        {
            return;
        }

        $carbon = Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at);

        if ($carbon->diffInMonths(Carbon::now()) > 1)
        {
            // reset information
            $this->parameters = JSON::encode(null);
            $this->active = 1; // if not active
            $this->save();

            // gearman update information
            (new LinkObserver())
                ->created($this);
        }
    }

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
