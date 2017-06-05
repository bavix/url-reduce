<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\NewModel;
use App\Models\StatementModel;
use App\Models\TypeModel;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Table;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class FeedbackController extends Controller
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

            $content->header('Обратная связь');

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

            $content->header('Обратная связь');

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

            $content->header('Обратная связь');

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
        return Admin::grid(StatementModel::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->column('communication', 'Обратная связь')->sortable();
            $grid->column('created_at', 'Дата подачи')->sortable();

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {

        return Admin::form(StatementModel::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->text('communication', 'Обратная связь');

            $form->textarea('content', 'Текст');

            $form->ignore([
                'created_at',
                'updated_at'
            ]);

        });

    }

}
