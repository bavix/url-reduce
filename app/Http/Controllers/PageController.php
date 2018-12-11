<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{

    /**
     * @param Request $request
     * @param string $slug
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request, string $slug): View
    {
        $page = Page::live($slug)->first();
        return view('page', compact('page'));
    }

}
