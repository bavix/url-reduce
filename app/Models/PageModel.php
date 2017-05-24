<?php

namespace App\Models;

use Bavix\Helpers\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PageModel extends Model
{

    /**
     * @var string
     */
    protected $table = 'pages';
    protected $route = 'page.view';

    public function setImagesAttribute($pictures)
    {
        if (is_array($pictures)) {
            foreach ($pictures as $picture)
            {
                $model = new ImageModel();
                $model->src = $picture;
                $model->save();

                $this->gallery()->save($model);
            }
        }
    }

    public function setDocumentsAttribute($documents)
    {
        if (is_array($documents)) {
            foreach ($documents as $document)
            {
                $model = new DocumentModel();
                $model->src = $document;
                $model->save();

                $this->files()->save($model);
            }
        }
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
        return $this->belongsToMany(ImageModel::class, $this->table . '_images');
    }

    public function files()
    {
        return $this->belongsToMany(DocumentModel::class, $this->table . '_documents');
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
