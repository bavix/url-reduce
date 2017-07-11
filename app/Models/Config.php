<?php

namespace App\Models;

use Bavix\Helpers\JSON;
use Encore\Admin\Auth\Database\Administrator;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{

    /**
     * @var string
     */
    protected $table = 'configs';

    /**
     * @var array
     */
    protected static $data = [];

    /**
     * @param string $name
     * @param mixed  $value
     *
     * @return mixed
     */
    protected static function register($name, $value)
    {
        if ($name === 'logo')
        {
            $logo = Administrator::query()->first()->avatar;

            if ($logo)
            {
                return $logo;
            }

            return $value ?: 'https://via.placeholder.com/255x128';
        }

        if (!isset(static::$data[$name]))
        {
            $model        = new static();
            $model->name  = $name;
            $model->value = JSON::encode($value);

            $model->save();

            static::$data[$name] = $value;
        }

        return static::$data[$name];
    }

    /**
     * @param string $name
     * @param mixed  $default
     *
     * @return mixed|null
     */
    public static function getValue($name, $default = null)
    {
        if (!static::$data)
        {
            static::$data = static::all()->pluck('value', 'name')
                ->map([JSON::class, 'decode']);
        }

        return static::register($name, $default);
    }

}
