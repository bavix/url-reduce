<?php

namespace App\Http\Controllers;

use App\Models\QrModel;
use Illuminate\Http\Request;
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
            ->margin(0)
            ->color(61, 98, 119)
            ->merge(config('qr.logo'), .3, true)
            ->generate($model->url);

        return response($png, 200, [
            'Content-Type' => 'image/png',
            'Expires'      => gmdate('D, d M Y H:i:s \G\M\T', time() + (60 * 60 * (24) * 365))
        ]);
    }

}
