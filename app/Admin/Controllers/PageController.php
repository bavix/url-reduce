<?php

namespace App\Admin\Controllers;

use App\Models\Page;
use App\Facades\Admin;
use App\Accessor\Form;
use Encore\Admin\Grid;

class PageController extends AdminController
{

    protected $title = 'Страницы';
    protected $model = Page::class;

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

            $grid->column('friendly_url', 'URL')->sortable();
            $grid->column('title', 'Заголовок')->sortable();

            $grid->column('description', 'Описание');

            $grid->column('active', 'Active')
                ->display(function ($res) {

                    if ($res)
                    {
                        return '<span class="badge bg-blue">Yes</span>';
                    }

                    return '<span class="badge bg-yellow">No</span>';
                });

            $grid->exporter(new \App\Accessor\CsvExporter());

        });
    }

    /**
     * Make a form builder.
     *
     * @param int $id
     *
     * @return Form
     */
    protected function form($id = null)
    {

        return Admin::form($this->model, function (Form $form)
        {

            $form->display('id', 'ID');

            $form->text('friendly_url', 'URL');
            $form->text('title', 'Заголовок');

            $form->textarea('description', 'Описание');

            $form->editor('content', 'Текст');

            $form->switch('active', 'Видимость');

            $form->ignore(['created_at', 'updated_at']);

        });

    }

}
