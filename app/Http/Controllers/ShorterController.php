<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Tracker;
use Bavix\Helpers\Str;
use Illuminate\Http\Request;

class ShorterController extends Controller
{

    public function store(Request $request)
    {
        $url = trim($request->input('url'));

        if (empty($url))
        {
            return [
                'error' => __('blocks.shorten.empty')
            ];
        }

        if (stripos($url, $request->getHost()) !== false)
        {
            return [
                'error' => __('blocks.shorten.reduceTheReduced')
            ];
        }

        if (!preg_match('~^https?://~', $url))
        {
            $url = 'http://' . $url;
        }

        if (!filter_var($url, FILTER_VALIDATE_URL) || !preg_match('~\.~', $url))
        {
            return [
                'error' => __('blocks.shorten.validateUrl')
            ];
        }

        $model = Link::addUrl($url);

        if (!$model->active)
        {
            return [
                'error' => __('blocks.shorten.noAllow')
            ];
        }

        return $model;
    }

    public function index(Request $request)
    {
        Tracker::hit();

        return $this->render('layouts.app');
    }

    public function hash(Request $request, $hash)
    {
        $model = Link::findByHash($hash);
        abort_if($model === null, 404);
        abort_if(!$model->active, 403, __('bavix.http.403_2'));

        Tracker::hit($model);

        return redirect($model->url);
    }

}
