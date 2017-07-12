<?php

use Illuminate\Routing\Router;
use Encore\Admin\Facades\Admin;

Admin::registerHelpersRoutes();

// dashboard
Route::group([
    'prefix'     => config('admin.prefix'),
    //    'namespace'     => Admin::controllerNamespace(),
    'middleware' => ['web', 'admin'],
], function (Router $router)
{

    // dashboard
    $router->resource('/', \App\Admin\Controllers\DashboardController::class);

    // counters
    $router->resource('/counters', \App\Admin\Controllers\CounterController::class);

    // trackers
    $router->resource('/trackers', \App\Admin\Controllers\TrackerController::class);

    // configs
    $router->resource('/config', \App\Admin\Controllers\ConfigController::class);

    // links
    $router->resource('/links', \App\Admin\Controllers\LinkController::class);

    // feedback
    $router->resource('/feedback', \App\Admin\Controllers\FeedbackController::class);
    $router->get('/feedback/doc/{id}', \App\Admin\Controllers\FeedbackController::class . '@doc')
        ->name('feedback.doc');

    // lg.trash
    $router->delete('/trash', 'App\Admin\Extensions\LG\Trash@index')
        ->name('lg.trash');

    // doc.trash
    $router->delete('/doc-trash', 'App\Admin\Extensions\Doc\Trash@index')
        ->name('doc.trash');

});
