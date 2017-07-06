<?php

namespace App\Models;

use Bavix\Helpers\Str;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class PollModel extends Model
{

    use Searchable;

    /**
     * @var string
     */
    protected $table = 'polls';
    protected $route = 'poll.view';

    /**
     * Получить имя индекса для модели.
     *
     * @return string
     */
    public function searchableAs()
    {
        return $this->table . '_index';
    }

    public function questions()
    {
        return $this->hasMany(QuestionModel::class, 'poll_id');
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
