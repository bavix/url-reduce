<?php

namespace App\Http\Controllers;

use App\Models\ImageModel;
use Illuminate\Http\Request;

class DebugController extends Controller
{

    public function index(Request $request)
    {
        if ($request->query->has('image'))
        {
            foreach (ImageModel::all() as $image)
            {
                $image->doBackground();
            }

            return $request->attributes->all();
        }

        abort(423);
    }

}
