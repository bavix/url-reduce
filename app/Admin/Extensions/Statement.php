<?php

namespace App\Admin\Extensions;

use Encore\Admin\Admin;

class Statement
{

    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    protected function render()
    {
        return '<a href="' . route('statement.doc', [$this->id]) . '" target="_blank" class="btn btn-xs btn-success grid-check-row">
            <i class="fa fa-print"></i>
        </a>';
    }

    public function __toString()
    {
        return $this->render();
    }

}
