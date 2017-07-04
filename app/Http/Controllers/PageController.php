<?php

namespace App\Http\Controllers;

use App\Models\PageModel;
use Illuminate\Http\Request;

class PageController extends AlbumController
{

    protected $model       = PageModel::class;
    protected $route       = 'page';
    protected $title       = 'Страницы';
    protected $description = 'Список страниц';

    protected $mainPage = true;

    public function main(Request $request)
    {
        $model = PageModel::query()
            ->where('main_page', 1)
            ->where('active', 1)
            ->first();

        abort_if(!$model, 404);

        return $this->view($request, $model->id);
    }

}
