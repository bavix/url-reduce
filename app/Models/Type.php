<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';

    public function statements()
    {
        return $this->hasMany(Statement::class);
    }

}
