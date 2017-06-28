<?php

namespace App\Http\Controllers;

use App\Models\AlbumModel;
use App\Models\FeedbackModel;
use App\Models\LinkModel;
use App\Models\NewModel;
use App\Models\PageModel;
use App\Models\PollModel;
use App\Models\QrModel;
use App\Models\StatementModel;
use App\Models\TrackerModel;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Intervention\Image\Imagick\Font;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRController extends Controller
{

    public function index(Request $request, $hash)
    {
        $model = QrModel::findByHash($hash);

        abort_if($model === null, 404);

        /**
         * @var $qr \SimpleSoftwareIO\QrCode\BaconQrCodeGenerator
         */
        $qr = QrCode::format('png');

        $png = $qr
            ->size(400)
            ->margin(1)
            ->color(61, 98, 119)
            ->merge(config('qr.logo'), .3, true)
            ->generate($model->url);

        return response($png, 200, [
            'Content-Type' => 'image/png'
        ]);
    }

}
