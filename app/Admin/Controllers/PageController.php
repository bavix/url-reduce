<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;

class PageController extends Controller
{
    public function default()
    {
        return Admin::content(function (Content $content) {

            $content->header('Pages');
//            $content->description('Description...');
        });
    }
}
