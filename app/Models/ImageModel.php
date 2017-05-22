<?php

namespace App\Models;

use Bavix\SDK\Path;
use Bavix\SDK\PathBuilder;
use Illuminate\Database\Eloquent\Model;

class ImageModel extends Model
{

    /**
     * @var string
     */
    protected $table = 'images';

    /**
     * @param string $config
     *
     * @return string
     */
    public function url($config = 'original')
    {
        return PathBuilder::sharedInstance()
            ->generate('sot', $config, $this->hash);
    }

}
