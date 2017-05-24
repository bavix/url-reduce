<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AlbumModel;
use App\Models\CategoryModel;
use App\Models\DocumentModel;
use App\Models\NewModel;
use App\Models\PageModel;
use App\Models\PollModel;
use App\Models\StatementModel;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Chart\Bar;
use Encore\Admin\Widgets\Chart\Doughnut;
use Encore\Admin\Widgets\Chart\Line;
use Encore\Admin\Widgets\Chart\Pie;
use Encore\Admin\Widgets\Chart\PolarArea;
use Encore\Admin\Widgets\Chart\Radar;
use Encore\Admin\Widgets\Collapse;
use Encore\Admin\Widgets\InfoBox;
use Encore\Admin\Widgets\Tab;
use Encore\Admin\Widgets\Table;

class DashboardController extends Controller
{
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Dashboard');

            $content->row(function (Row $row) {

                $row->column(2, new InfoBox('Подача заявлений', 'users', 'aqua', '/cp/statements', StatementModel::query()->count()));

                $row->column(2, new InfoBox('Новости', 'newspaper-o', 'yellow', '/cp/news', NewModel::query()->count()));

                $row->column(2, new InfoBox('Категории', 'hashtag', 'red', '/cp/categories', CategoryModel::query()->count()));

                $row->column(2, new InfoBox('Опросы', 'question-circle', 'gray', '/cp/polls', PollModel::query()->count()));

                $row->column(2, new InfoBox('Страницы', 'file-text', 'blue', '/cp/pages', PageModel::query()->count()));

                $row->column(2, new InfoBox('Альбомы', 'picture-o', 'green', '/cp/albums', AlbumModel::query()->count()));

            });

        });
    }
}
