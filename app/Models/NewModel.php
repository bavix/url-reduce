<?php

namespace App\Models;

use Bavix\Helpers\Str;
use Illuminate\Database\Eloquent\Model;

class NewModel extends PageModel
{

    /**
     * @var string
     */
    protected $table = 'news';
    protected $route = 'new.view';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(CategoryModel::class);
    }

}
