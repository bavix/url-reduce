<?php

namespace App\Models;

use Bavix\Helpers\Dir;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

class ImageModel extends Model
{

    /**
     * @var string
     */
    protected $table = 'images';

    /**
     * @param int $width
     *
     * @return string
     */
    protected function resize($width)
    {
        $path = 'thumbs/' . $width . '/' . $this->src;
        $real = public_path('upload/' . $path);
        $org  = public_path('upload/' . $this->src);

        // placeHoldIt
        if (!realpath($real) && !realpath($org))
        {
            $path = 'default/' . $width . '/placeholdit.png';
            $real = public_path('upload/' . $path);
            $org  = public_path('default/placeholdit.png');
        }

        try
        {

            if (!realpath($real))
            {
                $dir = dirname($real);

                Dir::make($dir);

                $image = Image::make($org);

                $_width = $image->width() <= $width ? $image->width() : $width;

                $image->resize($_width, round($_width / 16 * 9), function ($constraint) {
                    $constraint->aspectRatio();
                });

                $image->save($real);
            }

            return $path;

        }
        catch (\Throwable $throwable)
        {
            return $this->src;
        }

    }

    public function thumbs()
    {
        return $this->resize(200);
    }

    public function preview()
    {
        return $this->resize(730);
    }

    public function fullHD()
    {
        return $this->resize(1920);
    }

}
