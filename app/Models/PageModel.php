<?php

namespace App\Models;

use Bavix\Helpers\Str;
use Illuminate\Database\Eloquent\Model;

class PageModel extends AlbumModel
{

    /**
     * @var string
     */
    protected $table = 'pages';
    protected $route = 'page.view';

    public function setContentAttribute($content)
    {
        $config = \HTMLPurifier_Config::createDefault();
        $config->set('Cache.SerializerPath', base_path('storage/purifier'));
        $config->set('HTML.Nofollow', true);
        $config->set('HTML.Trusted', true);
        $config->set('Attr.AllowedRel', ['nofollow']);

        $data = (new \HTMLPurifier($config))->purify($content);
        $data = str_replace('<table>', '<table class="table table-responsive">', $data);

        $this->attributes['content'] = $data;
    }

    public function files()
    {
        return $this->belongsToMany(DocumentModel::class, $this->table . '_documents');
    }

}
