<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;

class NewController extends Controller
{
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('News');
//            $content->description('Description...');
        });
    }
}
