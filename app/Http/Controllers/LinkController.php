<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use App\Http\Requests\UrlRequest;

class LinkController extends Controller
{

    public function index()
    {

    }

    /**
     * @param UrlRequest $request
     * @return array|string|null
     */
    public function store(LinkRequest $request)
    {
        return $request->input();
    }

}
