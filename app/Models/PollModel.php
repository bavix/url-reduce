<?php

namespace App\Models;

use Bavix\Helpers\Str;
use Illuminate\Database\Eloquent\Model;

class PollModel extends Model
{

    /**
     * @var string
     */
    protected $table = 'polls';
    protected $route = 'poll.view';

    public function questions()
    {
        return $this->hasMany(QuestionModel::class);
    }

    /**
     * @return string
     */
    public function url()
    {
        return route($this->route, [
            'id'    => $this->id,
            'title' => Str::friendlyUrl($this->title),
        ]);
    }

}
