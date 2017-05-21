<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NewModel;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Table;

class NewController extends Controller
{
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('News');
//            $content->description('Description...');

//            ModelLoader( modelName::class )

            $content->row(new Box('hello',
                new Table(

                    // columns
                    ['id', 'title'],

                    // data loader
                    [
                        [1, '1'],
                        [2, '2'],
                        [2, '2'],
                        [2, '2'],
                        [2, '2']
                    ]
                )
            ));
        });
    }
}
