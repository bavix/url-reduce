<?php

namespace App\Http\Controllers;

use App\Models\Qr;
use Illuminate\Http\Request;

class ShorterController extends Controller
{

    public function index(Request $request, $hash)
    {
        $model = Qr::findByHash($hash);
        abort_if($model === null, 404);

        header('Location: ' . $model->url, true, 301);
        die;

//        return redirect($model->url, 301);
    }

}
