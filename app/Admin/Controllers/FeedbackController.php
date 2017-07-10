<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\BtnPrint;
use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\FeedbackModel;
use App\Models\NewModel;
use App\Models\StatementModel;
use App\Models\TypeModel;
use Encore\Admin\Controllers\ModelForm;
use App\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Table;
use App\Accessor\Form;
use Encore\Admin\Grid;
use Illuminate\Http\Request;

class FeedbackController extends AdminController
{

    protected $title = 'Обратная связь';
    protected $model = FeedbackModel::class;

    protected function doc(Request $request, $id)
    {
        return view('docs.feedback', FeedbackModel::query()->findOrFail($id));
    }

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

            $grid->column('communication', 'Обратная связь')->sortable();
            $grid->column('created_at', 'Дата подачи')->sortable();

            $grid->exporter(new \App\Accessor\CsvExporter());

            $grid->actions(function (Grid\Displayers\Actions $actions)
            {
                $actions->append(new BtnPrint($actions->getKey(), 'feedback.doc'));
            });

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

            $form->text('name', 'Имя');

            $form->text('communication', 'Обратная связь');

            $form->textarea('content', 'Текст');

            $form->ignore([
                'created_at',
                'updated_at'
            ]);

        });

    }

}
