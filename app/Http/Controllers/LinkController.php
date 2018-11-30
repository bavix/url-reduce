<?php

namespace App\Http\Controllers;

use App\Http\Requests\HashRequest;
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
    public function store(HashRequest $request)
    {
        return $request->input();
    }

}
