<?php

namespace App\Admin\Controllers;

use App\Models\Page;

class PageController extends PostController
{

    protected $category = false;
    protected $title    = 'Страницы';
    protected $model    = Page::class;

    protected $mainPage = true;

}
