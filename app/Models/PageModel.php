<?php

namespace App\Models;

use Bavix\Helpers\Str;
use Illuminate\Database\Eloquent\Model;

class PageModel extends Model
{

    /**
     * @var string
     */
    protected $table = 'pages';
    protected $route = 'page.view';

    public function setPictureAttribute($picture, $toModel = true)
    {
        $model      = new ImageModel();
        $model->src = $picture;
        $model->save();

        $this->id or $this->save();

        if (!$toModel)
        {
            $this->gallery()->save($model);

            return;
        }

        $this->image_id = $model->id;
        $this->save();
    }

    public function setImagesAttribute($pictures)
    {
        if (is_array($pictures))
        {
            foreach ($pictures as $picture)
            {
                $this->setPictureAttribute($picture, false);
            }
        }
    }

    public function setDocumentsAttribute($documents)
    {
        if (is_array($documents)) {
            foreach ($documents as $document)
            {
                $model = new DocumentModel();
                $model->title = basename( $document );
                $model->src = $document;
                $model->save();

                $this->id or $this->save();

                $this->files()->save($model);
            }
        }
    }

    public function setContentAttribute($content)
    {
        $config = \HTMLPurifier_Config::createDefault();
        $config->set('Cache.SerializerPath', base_path('storage/purifier'));
        $config->set('HTML.Trusted', true);

        $data = (new \HTMLPurifier($config))->purify($content);
        $data = str_replace('<table>', '<table class="table">', $data);

        $this->attributes['content'] = $data;
    }

    public function image()
    {
        return $this->belongsTo(ImageModel::class);
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
