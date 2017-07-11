<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\BtnPreview;
use App\Admin\Extensions\LG\Trash;
use App\Http\Controllers\Controller;
use App\Models\Album;
use Encore\Admin\Controllers\ModelForm;
use App\Facades\Admin;
use App\Accessor\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class AlbumController extends AdminController
{

    protected $title = 'Альбом';
    protected $model = Album::class;

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

            $grid->column('active', 'Видимость')->display(function ($data)
            {
                return $data ? 'Включена' : 'Выключена';
            })->sortable();

            $grid->actions(function (Grid\Displayers\Actions $actions)
            {
                $actions->append(new BtnPreview($actions->getKey(), 'album.preview'));
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

            $form->image('picture', 'Изображение')->uniqueName();
            $form->logo('logo', '');

            $form->multipleImage('gallery', 'Галерея')->uniqueName();
            $form->lightGallery('pictures', '')->options([
                'column' => 'images'
            ]);

            $form->switch('active', 'Видимость');

            $form->ignore(['created_at', 'updated_at']);

        });

    }

}
