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
    protected $table = 'links';

    public $timestamps = false;

    /**
     * @return Link[]
     */
    public static function live()
    {
        return static::query()
            ->where('active', 1)
            ->where('blocked', 0)
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();
    }

    public function updateMetadata()
    {
        if (!$this->updated_at)
        {
            return;
        }

        $carbon = Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at);

        if ($carbon->diffInWeeks(Carbon::now()) >= 2)
        {
            // reset information
            $this->parameters = JSON::encode(null);
            $this->active     = 1; // if not active
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

    // property parameters

    private $_parameters = [];

    /**
     * @return array|mixed
     */
    private function _parameters()
    {
        if (empty($this->_parameters) && $this->parameters !== 'null')
        {
            $this->_parameters = JSON::decode($this->parameters);
        }

        return $this->_parameters;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->_parameters()['title'] ?? $this->url;
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return array_slice($this->_parameters()['tags'] ?? [], 0, 7);
    }

    /**
     * @return mixed
     */
    public function getFavicon()
    {
        return $this->_parameters()['providerIcon'] ?? $this->url;
    }

}
