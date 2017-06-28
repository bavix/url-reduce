<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\LG\Trash;
use App\Http\Controllers\Controller;
use App\Models\AlbumModel;
use App\Models\TrackerModel;
use Encore\Admin\Controllers\ModelForm;
use App\Facades\Admin;
use App\Accessor\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class TrackerController extends AdminController
{

    protected $title = 'Трекер';
    protected $model = TrackerModel::class;

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid($this->model, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->column('ip', 'IP адрес')->sortable();
            $grid->column('referer', 'Откуда');
            $grid->column('url', 'Куда');
            $grid->column('language', 'Язык');

            $grid->column('created_at', 'Время визита');

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {

        return Admin::form($this->model, function (Form $form) {

            $form->display('id', 'ID');

            $form->ip('ip', 'IP');
            $form->text('referer', 'Откуда');
            $form->text('url', 'Куда');
            $form->text('language', 'Язык');

            $form->ignore(['created_at', 'updated_at']);

        });

    }

}
