<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnswerModel extends Model
{
    protected $table = 'answers';

    protected $fillable = ['answer'];

    public function question()
    {
        return $this->belongsTo(QuestionModel::class);
    }
}