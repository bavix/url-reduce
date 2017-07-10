<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\Notify;
use Encore\Admin\Controllers\ModelForm;
use App\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Table;
use App\Accessor\Form;
use Encore\Admin\Grid;

class NotifyController extends AdminController
{

    protected $title = 'Уведомления';
    protected $model = Notify::class;

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

            $grid->column('content', 'Контент')
                ->display(function ($text) {
                    $content = strip_tags($text);

                    if (strlen($content) > 400)
                    {
                        $content = substr($content, 0, 400) . '...';
                    }

                    return $content;
                })
                ->sortable();

            $grid->column('active', 'Видимость')->display(function ($data)
            {
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

        return Admin::form($this->model, function (Form $form)
        {

            $form->display('id', 'ID');

            $form->ckeditor('content', 'Контент');

            $form->switch('active', 'Видимость');

            $form->ignore(['created_at', 'updated_at']);

        });

    }

}
