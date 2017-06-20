<?php

namespace App\Accessor;

use Closure;

class Admin extends \Encore\Admin\Admin
{

    public function form($model, Closure $callable)
    {
        return new Form($this->getModel($model), $callable);
    }

}
