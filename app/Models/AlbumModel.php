<?php

namespace App\Models;

use Bavix\Helpers\JSON;
use Bavix\Helpers\Str;
use Illuminate\Database\Eloquent\Model;

class AlbumModel extends Model
{

    protected $table = 'albums';
    protected $route = 'album.view';

    public function setPictureAttribute($picture, $toModel = true)
    {
        $model      = new ImageModel();
        $model->src = $picture;
        $model->save();

        $this->id or $this->save();

        if (class_exists(\GearmanClient::class))
        {
            try
            {
                $client = new \GearmanClient();
                $client->addServer(
                    config('gearman.host'),
                    config('gearman.port')
                );

                $client->doBackground('resize', serialize($model));
            }
            catch (\Throwable $throwable)
            {
            }
        }

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

    public function image()
    {
        return $this->belongsTo(ImageModel::class);
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
