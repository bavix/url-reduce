<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    /**
     * @param string $slug
     *
     * @return Builder
     */
    public static function live(string $slug): Builder
    {
        return static::query()
            ->where('active', true)
            ->where('friendly_url', $slug);
    }

}
