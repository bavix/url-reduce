<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;

class PollController extends Controller
{
    public function default()
    {
        return Admin::content(function (Content $content) {

            $content->header('Polls');
//            $content->description('Description...');
        });
    }
}
