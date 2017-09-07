<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    protected $table = 'reports';

    public function link()
    {
        return $this->belongsTo(Link::class);
    }

}
