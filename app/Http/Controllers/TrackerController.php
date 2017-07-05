<?php

namespace App\Http\Controllers;

use App\Models\AlbumModel;
use App\Models\FeedbackModel;
use App\Models\LinkModel;
use App\Models\NewModel;
use App\Models\PageModel;
use App\Models\PollModel;
use App\Models\StatementModel;
use App\Models\TrackerModel;
use Bavix\Helpers\JSON;
use Intervention\Image\Facades\Image;
use Intervention\Image\Imagick\Font;

class TrackerController extends Controller
{

    public function statistics()
    {
        $graphHost = TrackerModel::graphHost()->pluck('res', 'month')
            ->toArray();

        $graphHit = TrackerModel::graphHit()->pluck('res', 'month')
            ->toArray();

        return $this->render('tracker.statistics', [

            'title' => 'Статистика сайта',

            'description' => 'На данной странице содержится вся статистика сайта',

            'chartLabels'   => JSON::encode(array_keys($graphHost)),
            'chartDataHost' => JSON::encode(array_values($graphHost)),
            'chartDataHit'  => JSON::encode(array_values($graphHit)),

            'newCount' => NewModel::query()
                ->where('active', 1)
                ->count(),

            'pageCount' => PageModel::query()
                ->where('active', 1)
                ->where('main_page', 0)
                ->count(),

            'albumCount' => AlbumModel::query()
                ->where('active', 1)
                ->count(),

            'linkCount' => LinkModel::query()
                ->where('active', 1)
                ->count(),

            'pollCount' => PollModel::query()
                ->where('active', 1)
                ->count(),

            'statementCount' => StatementModel::query()->count(),

        ], $this->mergeData());
    }

    public function index()
    {
        /**
         * @var $img \Intervention\Image\Image
         */
        $img = Image::canvas(88, 31, QRController::hex());

        $img->text('hosts: ' . TrackerModel::hostAllCount(), 2, 9, function (Font $font)
        {
            $font->file(config('tracker.font'));
            $font->size(9);
            $font->color('#fff');
        });

        $img->text('hits: ' . TrackerModel::hitAllCount(), 2, 19, function (Font $font)
        {
            $font->file(config('tracker.font'));
            $font->size(9);
            $font->color('#fff');
        });

        $img->text('online: ' . TrackerModel::onlineCount(), 2, 28, function (Font $font)
        {
            $font->file(config('tracker.font'));
            $font->size(9);
            $font->color('#fff');
        });

        $img->text('bavix.ru', 49, 28, function (Font $font)
        {
            $font->file(config('tracker.font'));
            $font->size(9);
            $font->color('#ccc');
        });

        return $img->response('png');
    }

}
