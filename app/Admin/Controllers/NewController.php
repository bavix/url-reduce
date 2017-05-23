<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\ImageModel;
use App\Models\NewModel;
use Bavix\Helpers\Str;
use Bavix\SDK\PathBuilder;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Table;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class NewController extends Controller
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

            $content->header('Новости');

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

            $content->header('Новости');

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

            $content->header('Новости');

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
        return Admin::grid(NewModel::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->column('title', 'Название')->sortable();
            $grid->column('description', 'Описание');
            $grid->column('category.title','Категория')->sortable();
            $grid->column('active', 'Видимость')->display(function ($data) {
                return $data ? 'Включена' : 'Выключена';
            })->sortable();

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {

        return Admin::form(NewModel::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->text('title', 'Заголовок');

            $form->textarea('description', 'Описание')->rows(3);
            $form->ckeditor('content', 'Текст');

            $form->image('image', 'Изображение');

            $form->select('category_id', 'Категория')->options(
                CategoryModel::all('id', 'title')
                    ->pluck('title' , 'id')
                    ->all()
            );

            $form->multipleImage('images', 'Галерея');
            $form->lightGallery('pictures', '');

            $form->switch('active', 'Видимость');
            
            $form->ignore(['created_at', 'updated_at']);

        });

    }

}
