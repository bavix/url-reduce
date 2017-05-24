<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\NewModel;
use App\Models\PollModel;
use App\Models\QuestionModel;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Table;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Вопросы');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('Вопросы');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('Вопросы');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(QuestionModel::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->column('poll.title', 'Опрос')->sortable();
            $grid->column('question', 'Название')->sortable();

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {

        return Admin::form(QuestionModel::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->select('poll_id', 'Опрос')
                ->options(
                    PollModel::all(['id', 'title'])
                        ->pluck('title', 'id')
                        ->all()
                );

            $form->text('question', 'Вопрос');

            $form->hasMany('answers', 'Ответы', function (Form\NestedForm $form) {
                $form->text('answer', 'Ответ');
            });

            $form->ignore(['created_at', 'updated_at']);

        });

    }

}
