<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DebugController extends Controller
{

    public function index(Request $request)
    {

        var_dump( $request->getScheme() );
        var_dump( $request->secure() );

        dump( $request );
        die;
    }

}
