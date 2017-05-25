<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AlbumModel;
use App\Models\CategoryModel;
use App\Models\NewModel;
use App\Models\PageModel;
use App\Models\PollModel;
use App\Models\StatementModel;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\InfoBox;

class DashboardController extends Controller
{
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Приборная панель');

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
