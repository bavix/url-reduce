<?php

namespace App\Http\Controllers;

use App\Models\PageModel;

class PageController extends AlbumController
{

    protected $model       = PageModel::class;
    protected $route       = 'page';
    protected $title       = 'Страницы';
    protected $description = 'Список страниц';

}
