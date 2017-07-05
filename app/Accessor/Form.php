<?php

namespace App\Accessor;

class Form extends \Encore\Admin\Form
{

    /**
     * Get current resource route url.
     *
     * @param int $slice
     *
     * @return string
     */
    public function resource($slice = -2)
    {
        $segments = explode('/', rtrim(request()->getRequestUri(), '/'));

        if ($slice != 0)
        {
            $segments = array_slice($segments, 0, $slice);
        }

        return implode('/', $segments);
    }

}
