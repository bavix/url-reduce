<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class DebugController extends Controller
{

    public function index(Request $request)
    {
        if ($request->query->has('image'))
        {
            foreach (Image::all() as $image)
            {
                $image->doBackground();
            }

            return $request->attributes->all();
        }

        abort(423);
    }

}
