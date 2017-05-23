<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionModel extends Model
{
    protected $table = 'questions';

    public function answers()
    {
        return $this->hasMany(AnswerModel::class);
    }
}
