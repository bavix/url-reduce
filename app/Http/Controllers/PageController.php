<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index(Request $request, $friendly)
    {

        $model = Page::findByFriendly($friendly);

        abort_if($model === null, 404);
        abort_if(!$model->active, 404);

        return $this->render('layouts.page', [
            'item' => $model
        ]);

    }

}
