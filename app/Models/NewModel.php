<?php

namespace App\Models;

use Bavix\Helpers\Str;
use Illuminate\Database\Eloquent\Model;

class NewModel extends Model
{

    /**
     * @var string
     */
    protected $table = 'news';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(CategoryModel::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function image()
    {
        return $this->belongsTo(ImageModel::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ImageModel::class);
    }

    /**
     * @return string
     */
    public function friendly()
    {
        return  Str::friendlyUrl($this->title);
    }

}
