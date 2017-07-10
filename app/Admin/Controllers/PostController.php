<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\BtnPreview;
use App\Admin\Extensions\LG\Trash;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Bavix\Helpers\Str;
use Encore\Admin\Controllers\ModelForm;
use App\Facades\Admin;
use App\Accessor\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class PostController extends AdminController
{

    protected $category = true;
    protected $title    = 'Новости';
    protected $model    = Post::class;

    protected $mainPage = false;

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

            $grid->column('title', 'Название')->sortable();
            $grid->column('description', 'Описание');

            if ($this->category)
            {
                $grid->column('category.title', 'Категория')->sortable();
            }

            $grid->column('active', 'Видимость')->display(function ($data)
            {
                return $data ? 'Включена' : 'Выключена';
            })->sortable();

            if ($this->mainPage)
            {
                $grid->column('main_page', 'Главная страница')->display(function ($data)
                {
                    return $data ? 'Включена' : 'Выключена';
                })->sortable();
            }

            $self = $this;

            $grid->actions(function (Grid\Displayers\Actions $actions) use ($self)
            {

                if ($self->category)
                {
                    $actions->append(new BtnPreview($actions->getKey(), 'new.preview'));
                }
                else
                {
                    $actions->append(new BtnPreview($actions->getKey(), 'page.preview'));
                }

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

            $form->text('title', 'Заголовок');

            $form->textarea('description', 'Описание')->rows(3);
            $form->ckeditor('content', 'Текст');

            $form->image('picture', 'Изображение')
                ->uniqueName();
            $form->logo('logo', '');

            if ($this->category)
            {
                $form->select('category_id', 'Категория')->options(
                    Category::all('id', 'title')
                        ->pluck('title', 'id')
                        ->all()
                );
            }

            $form->multipleImage('images', 'Галерея')->uniqueName();
            $form->lightGallery('pictures', '')->options([
                'column' => 'gallery'
            ]);

            $form->multipleFile('documents', 'Документы')
                ->name(function (\Illuminate\Http\UploadedFile $upload)
                {
                    $original = $upload->getClientOriginalName();

                    return Str::random(8) . '/' . $original;
                });

            $form->documents('readable', '')->options([
                'column' => 'files'
            ]);

            if ($this->mainPage)
            {
                $form->switch('main_page', 'Главная Страница');
            }

            $form->switch('active', 'Видимость');

            $form->ignore(['created_at', 'updated_at']);

        });

    }

}
