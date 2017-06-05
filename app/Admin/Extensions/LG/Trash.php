<?php

namespace App\Admin\Extensions\LG;

use Illuminate\Http\Request;

trait Trash
{

    /**
     * @param Request $request
     *
     * @return array
     */
    public function lgTrash(Request $request)
    {
        $itemId  = $request->input('itemId', null);
        $imageId = $request->input('imageId', null);

        if (!$itemId || !$imageId)
        {
            return ['result' => false];
        }

        $class = $this->model;
        $item  = $class::query()->findOrFail($itemId);

        return ['result' => (bool)$item->gallery()->detach($imageId)];
    }

}
