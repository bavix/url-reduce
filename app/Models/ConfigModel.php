<?php

namespace App\Models;

use Encore\Admin\Auth\Database\Administrator;
use Illuminate\Database\Eloquent\Model;

class ConfigModel extends Model
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
            $model->value = $value;

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
            static::$data = static::all()->pluck('value', 'name');
        }

        return static::register($name, $default);
    }

}
