<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('v1/{model}', function (Request $request, $model)
{

    $withPreload = false;

    $preload = $request->query('preload', []);

    $search = $request->query('search');

    $terms   = $request->query('terms', []);
    $greater = $request->query('greater', []);
    $less    = $request->query('less', []);
    $sort    = $request->query('sort', ['id' => 'desc']);

    $model = strtolower($model);
    $model = '\\App\\Models\\' . ucfirst($model);

    if ($search && method_exists($model, 'search'))
    {
        $object      = $model::search($search);
        $withPreload = true;
    }
    else
    {
        $object = $model::with($preload);
    }

    foreach ($terms as $column => $value)
    {
        $object->where($column, $value);
    }

    foreach ($greater as $column => $value)
    {
        $object->where($column, '>', $value);
    }

    foreach ($less as $column => $value)
    {
        $object->where($column, '<', $value);
    }

    foreach ($sort as $column => $direction)
    {
        $object->orderBy($column, $direction);
    }

    $paginate = $object->paginate(50);

    if ($withPreload)
    {
        $paginate->load($preload);
    }

    return $paginate;
});

Route::get('embed', function (Request $request) {

    if (!($url = $request->input('url')))
    {
        return [
            'error' => 'Query param `url` is undefined'
        ];
    }
    
    $dispatcher = new \Embed\Http\CurlDispatcher([
        CURLOPT_MAXREDIRS      => 20,
        CURLOPT_CONNECTTIMEOUT => 5,
        CURLOPT_TIMEOUT        => 5,
        CURLOPT_ENCODING       => 'UTF-8',
        CURLOPT_AUTOREFERER    => true,
        CURLOPT_USERAGENT      => 'Mozilla/5.0 (compatible; bavix/metabot-v2.1; +https://bavix.ru/bot.html)',
        CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4,
    ]);

    return \App\Helpers\Embed::read($url, null, $dispatcher);

});

Route::match(['get', 'post'], 'add', 'ShorterController@store');

Route::get('test', function (Request $request) {
    foreach (\App\Models\Link::query()->where('active', 1)->whereNull(DB::RAW('parameters->>"$.url"'))->get() as $link) {
        (new \App\Observers\LinkObserver())->created($link);
    }

    return $request->all();
});
