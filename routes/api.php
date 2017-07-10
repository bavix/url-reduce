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

    $preload = $request->query('preload', []);

    $terms   = $request->query('terms', []);
    $greater = $request->query('greater', []);
    $less    = $request->query('less', []);
    $sort    = $request->query('sort', ['id' => 'desc']);

    $model = strtolower($model);
    $model = '\\App\\Models\\' . ucfirst($model) . 'Model';

    $object = $model::with($preload);

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

    return $object->paginate(50);

});
