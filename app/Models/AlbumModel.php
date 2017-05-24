<?php

namespace App\Models;

use Bavix\Helpers\Str;
use Illuminate\Database\Eloquent\Model;

class AlbumModel extends Model
{

    protected $table = 'albums';
    protected $route = 'album.view';

    public function setImagesAttribute($pictures)
    {
        if (is_array($pictures)) {
            foreach ($pictures as $picture)
            {
                $model = new ImageModel();
                $model->src = $picture;
                $model->save();

                $this->id or $this->save();

                $this->gallery()->save($model);
            }
        }
    }

    public function gallery()
    {
        return $this->belongsToMany(ImageModel::class, $this->table . '_images');
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
