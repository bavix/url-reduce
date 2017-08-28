<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Link;
use Encore\Admin\Controllers\ModelForm;
use App\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Table;
use App\Accessor\Form;
use Encore\Admin\Grid;

class LinkController extends AdminController
{

    protected $title = 'Ссылки';
    protected $model = Link::class;

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid($this->model, function (Grid $grid)
        {

            $grid->id('ID')->sortable();

            $grid->column('url', 'URL')->sortable();
            $grid->column('hash', 'Hash')->sortable();

            $grid->column('active', 'Active')
                ->display(function ($res) {

                    if ($res)
                    {
                        return '<span class="badge bg-blue">Yes</span>';
                    }

                    return '<span class="badge bg-yellow">No</span>';
                });

            $grid->column('blocked', 'Blocked')
                ->display(function ($res) {

                    if ($res)
                    {
                        return '<span class="badge bg-red">Yes</span>';
                    }

                    return '<span class="badge bg-green">No</span>';
                });

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

        return Admin::form($this->model, function (Form $form)
        {

            $form->display('id', 'ID');

            $form->url('url', 'URL');
            $form->text('hash', 'Хэш');

            $form->switch('active', 'Видимость');

            $form->textarea('message', 'Сообщение');
            $form->switch('blocked', 'Заблокировать');

            $form->ignore(['created_at', 'updated_at']);

        });

    }

}
