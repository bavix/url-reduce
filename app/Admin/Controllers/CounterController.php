<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\LG\Trash;
use App\Http\Controllers\Controller;
use App\Models\AlbumModel;
use App\Models\CounterModel;
use Encore\Admin\Controllers\ModelForm;
use App\Facades\Admin;
use App\Accessor\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class CounterController extends AdminController
{

    protected $title = 'Счётчики';
    protected $model = CounterModel::class;

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid($this->model, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->column('title', 'Название')->sortable();

            $grid->column('active', 'Видимость')->display(function ($data) {
                return $data ? 'Включена' : 'Выключена';
            })->sortable();

            $grid->exporter(new \App\Accessor\CsvExporter());

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

            $form->text('title', 'Заголовок');

            $form->textarea('code', 'Код счётчика')->rows(6);

            $form->switch('active', 'Видимость');

            $form->ignore(['created_at', 'updated_at']);

        });

    }

}
