<?php

namespace App\Admin\Controllers;

use App\Models\PageModel;

class PageController extends NewController
{

    protected $category = false;
    protected $title    = 'Страницы';
    protected $model    = PageModel::class;

    protected $mainPage = true;

}
