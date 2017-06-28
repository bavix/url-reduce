<?php

namespace App\Http\Controllers;

use App\Models\TrackerModel;
use Intervention\Image\Facades\Image;
use Intervention\Image\Imagick\Font;

class TrackerController extends Controller
{

    public function index()
    {
        /**
         * @var $img \Intervention\Image\Image
         */
        $img = Image::canvas(88, 31, '#3d6277');

        $img->text('hosts: ' . TrackerModel::hostAllCount(), 2, 9, function (Font $font) {
            $font->file(config('tracker.font'));
            $font->size(9);
            $font->color('#fff');
        });

        $img->text('hits: ' . TrackerModel::hitAllCount(), 2, 19, function (Font $font) {
            $font->file(config('tracker.font'));
            $font->size(9);
            $font->color('#fff');
        });

        $img->text('online: ' . TrackerModel::onlineCount(), 2, 28, function (Font $font) {
            $font->file(config('tracker.font'));
            $font->size(9);
            $font->color('#fff');
        });

        $img->text('bavix.ru', 49, 28, function (Font $font) {
            $font->file(config('tracker.font'));
            $font->size(9);
            $font->color('#ccc');
        });

        return $img->response('png');
    }

}
