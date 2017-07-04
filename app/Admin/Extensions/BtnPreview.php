<?php

namespace App\Admin\Extensions;

class BtnPreview
{

    protected $id;
    protected $route;

    public function __construct($id, $route)
    {
        $this->id = $id;
        $this->route = $route;
    }

    protected function render()
    {
        return '<a href="' . route($this->route, [$this->id, 'sandbox']) . '" target="_blank" class="btn btn-xs btn-success grid-check-row">
            <i class="fa fa-eye"></i>
        </a>';
    }

    public function __toString()
    {
        return $this->render();
    }

}
