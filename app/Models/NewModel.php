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

    public function setImagesAttribute($pictures)
    {
        if (is_array($pictures)) {
            foreach ($pictures as $picture)
            {
                $model = new NewImageModel();
                $model->src = $picture;
                $model->new_model_id = $this->id;
                $model->save();
            }
        }
    }

    public function getImagesAttribute()
    {
        return [1,2,3];
    }

    public function setContentAttribute($content)
    {
        $config = \HTMLPurifier_Config::createDefault();
        $config->set('Cache.SerializerPath', base_path('storage/purifier'));

        $data = (new \HTMLPurifier($config))->purify($content);
        $data = str_replace('<table>', '<table class="table">', $data);

        $this->attributes['content'] = $data;
    }

    public function gallery()
    {
        return $this->hasMany(NewImageModel::class);
    }

    /**
     * @return string
     */
    public function friendly()
    {
        return  Str::friendlyUrl($this->title);
    }

    /**
     * @return string
     */
    public function url()
    {
        return route('new.view', [
            'id'    => $this->id,
            'title' => $this->friendly(),
        ]);
    }

}
