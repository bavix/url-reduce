<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Link;
use App\Models\Report;
use Encore\Admin\Controllers\ModelForm;
use App\Facades\Admin;
use Encore\Admin\Form\Tools;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Table;
use App\Accessor\Form;
use Encore\Admin\Grid;

class ReportController extends AdminController
{

    protected $title = 'Report';
    protected $model = Report::class;

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

            $grid->column('ip', 'ip')->sortable();
            $grid->column('link.url', 'link.url')->sortable();
            $grid->column('link.hash', 'link.hash')->sortable();

            $grid->column('checked', 'Проверено')
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
            $form->display('ip');
            $form->display('link.url');
            $form->display('link.hash');

            $form->switch('checked', 'Проверено');

            $form->ignore(['created_at', 'updated_at']);

        });

    }

}
