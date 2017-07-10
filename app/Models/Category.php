<?php

namespace App\Models;

use Bavix\Helpers\Str;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function url()
    {
        return route('post.category', [
            'id'    => $this->id,
            'title' => Str::friendlyUrl($this->title)
        ]);
    }

}
