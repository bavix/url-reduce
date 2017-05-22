<?php

namespace App\Http\Controllers;

use App\Models\NewModel;
use Illuminate\Http\Request;

class NewController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request, $id)
    {
        $model = NewModel::query()->find($id);
        abort_if(!$model, 404);

        return view('new.view', [
            'item' => $model
        ], $this->mergeData());
    }

}
