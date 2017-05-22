<?php

use Illuminate\Routing\Router;
use Encore\Admin\Facades\Admin;

Admin::registerHelpersRoutes();

// dashboard
Route::group([
    'prefix'        => config('admin.prefix'),
//    'namespace'     => Admin::controllerNamespace(),
    'middleware'    => ['web', 'admin'],
], function (Router $router) {

    // dashboard
    $router->resource('/', \App\Admin\Controllers\DashboardController::class);

    // categories
    $router->resource('/categories', \App\Admin\Controllers\CategoryController::class);

    // statements
    $router->resource('/statements', \App\Admin\Controllers\StatementController::class);

    // news
    $router->resource('/news', \App\Admin\Controllers\NewController::class);

    // albums
    $router->resource('/albums', \App\Admin\Controllers\AlbumController::class);

    // polls
    $router->resource('/polls', \App\Admin\Controllers\PollController::class);

    // files
    $router->resource('/documents', \App\Admin\Controllers\DocumentController::class);

});
