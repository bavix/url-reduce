<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeModel extends Model
{
    protected $table = 'types';

    public function statements()
    {
        return $this->hasMany(StatementModel::class);
    }

}
