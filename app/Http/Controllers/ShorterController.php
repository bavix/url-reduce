<?php

namespace App\Http\Controllers;

use App\Models\QrModel;
use Illuminate\Http\Request;

class ShorterController extends Controller
{

    public function index(Request $request, $hash)
    {
        $model = QrModel::findByHash($hash);
        abort_if($model === null, 404);

        return redirect($model->url, 301);
    }

}
