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

    $query   = $request->query('query');

    $terms   = $request->query('terms', []);
    $greater = $request->query('greater', []);
    $less    = $request->query('less', []);
    $sort    = $request->query('sort', ['id' => 'desc']);

    $model = strtolower($model);
    $model = '\\App\\Models\\' . ucfirst($model) . 'Model';

    if ($query && method_exists($model, 'search'))
    {
        $object = $model::search($query);
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
