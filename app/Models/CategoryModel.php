<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';

    public function news()
    {
        return $this->hasMany(NewModel::class);
    }

}
