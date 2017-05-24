<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PollModel extends Model
{

    /**
     * @var string
     */
    protected $table = 'polls';

    public function questions()
    {
        return $this->hasMany(QuestionModel::class);
    }

}
