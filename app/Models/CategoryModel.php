<?php

namespace App\Models;

use Bavix\Helpers\Str;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';

    public function news()
    {
        return $this->hasMany(NewModel::class);
    }

    public function url()
    {
        return route('new.category', [
            'id'    => $this->id,
            'title' => Str::friendlyUrl($this->title)
        ]);
    }

}
