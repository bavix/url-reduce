<?php

use Illuminate\Routing\Router;
use Encore\Admin\Facades\Admin;

//Admin::registerHelpersRoutes();
Admin::registerAuthRoutes();

// dashboard
Route::group([
//    'prefix'     => config('admin.prefix'),
    //    'namespace'     => Admin::controllerNamespace(),
//    'middleware' => ['web', 'admin'],

    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router)
{

    // dashboard
    $router->resource('/', DashboardController::class);

    // counters
    $router->resource('/counters', CounterController::class);

    // trackers
    $router->resource('/trackers', TrackerController::class);

    // configs
    $router->resource('/config', ConfigController::class);

    // links
    $router->resource('/links', LinkController::class);

    // feedback
    $router->resource('/feedback', FeedbackController::class);
    $router->get('/feedback/doc/{id}', FeedbackController::class . '@doc')
        ->name('feedback.doc');

    // lg.trash
    $router->delete('/trash', 'App\Admin\Extensions\LG\Trash@index')
        ->name('lg.trash');

    // doc.trash
    $router->delete('/doc-trash', 'App\Admin\Extensions\Doc\Trash@index')
        ->name('doc.trash');

});
