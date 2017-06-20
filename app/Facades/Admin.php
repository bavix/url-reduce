<?php

namespace App\Facades;

class Admin extends \Encore\Admin\Facades\Admin
{

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \App\Accessor\Admin::class;
    }

}
