<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\NewModel;
use App\Models\PollModel;
use App\Models\QuestionModel;
use Encore\Admin\Controllers\ModelForm;
use App\Facades\Admin;
use Encore\Admin\Form\NestedForm;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Table;
use App\Accessor\Form;
use Encore\Admin\Grid;
use Illuminate\Http\Request;

class QuestionController extends AdminController
{

    protected $title = 'Вопросы';
    protected $model = QuestionModel::class;

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid($this->model, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->column('poll.title', 'Опрос')->sortable();
            $grid->column('question', 'Название')->sortable();

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

            $form->select('poll_id', 'Опрос')
                ->options(
                    PollModel::all(['id', 'title'])
                        ->pluck('title', 'id')
                        ->all()
                );

            $form->text('question', 'Вопрос');

            $form->hasMany('answers', 'Ответы', function (NestedForm $form) {
                $form->text('answer', 'Ответ');
            });

            $form->ignore(['created_at', 'updated_at']);

        });

    }

}
