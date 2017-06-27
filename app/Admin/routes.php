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
    $router->resource('/types', \App\Admin\Controllers\TypeController::class);

    // counters
    $router->resource('/counters', \App\Admin\Controllers\CounterController::class);

    // trackers
    $router->resource('/trackers', \App\Admin\Controllers\TrackerController::class);

    // configs
    $router->resource('/config', \App\Admin\Controllers\ConfigController::class);

    // questions
    $router->resource('/questions', \App\Admin\Controllers\QuestionController::class);

    // links
    $router->resource('/links', \App\Admin\Controllers\LinkController::class);

    // feedback
    $router->resource('/feedback', \App\Admin\Controllers\FeedbackController::class);

    // statements
    $router->resource('/statements', \App\Admin\Controllers\StatementController::class);

    // categories
    $router->resource('/categories', \App\Admin\Controllers\CategoryController::class);

    // news
    $router->resource('/news', \App\Admin\Controllers\NewController::class);

    // albums
    $router->resource('/albums', \App\Admin\Controllers\AlbumController::class);

    // polls
    $router->resource('/polls', \App\Admin\Controllers\PollController::class);

    // pages
    $router->resource('/pages', \App\Admin\Controllers\PageController::class);

    // lg.trash
    $router->delete('/trash', 'App\Admin\Extensions\LG\Trash@index')
        ->name('lg.trash');

    // doc.trash
    $router->delete('/doc-trash', 'App\Admin\Extensions\Doc\Trash@index')
        ->name('doc.trash');

});
