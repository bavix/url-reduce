<?php

namespace App\Admin\Extensions\Form;

use Encore\Admin\Form\Field;

class Documents extends Field
{

    /**
     * @var string
     */
    protected $view = 'vendor.admin.form.documents';

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render()
    {
//        $class        = implode('.', $this->getElementClass());
//        $this->script = "$('textarea.{$class}').ckeditor();";

        $column = $this->options['column'];
        $this->variables['_documents'] = $this->form->model()->$column;
        $this->variables['itemId'] = $this->form->model()->id;

        return parent::render();
    }

}
