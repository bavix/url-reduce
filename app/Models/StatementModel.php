<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatementModel extends Model
{

    protected $table = 'statements';

    public function type()
    {
        return $this->belongsTo(TypeModel::class);
    }

}
