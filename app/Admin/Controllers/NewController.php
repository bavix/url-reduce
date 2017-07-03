<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\LG\Trash;
use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\NewModel;
use Bavix\Helpers\Str;
use Encore\Admin\Controllers\ModelForm;
use App\Facades\Admin;
use App\Accessor\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class NewController extends AdminController
{

    protected $category = true;
    protected $title    = 'Новости';
    protected $model    = NewModel::class;

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
                    CategoryModel::all('id', 'title')
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

            $form->switch('active', 'Видимость');

            $form->ignore(['created_at', 'updated_at']);

        });

    }

}
