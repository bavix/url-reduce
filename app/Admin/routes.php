<?php

use Illuminate\Routing\Router;

Admin::registerHelpersRoutes();

// dashboard
Route::group([
    'prefix'        => config('admin.prefix'),
//    'namespace'     => Admin::controllerNamespace(),
    'middleware'    => ['web', 'admin'],
], function (Router $router) {

    $router->get('/', 'App\Admin\Controllers\DashboardController@default');

    // pages
    $router->get('/statements', 'App\Admin\Controllers\StatementController@default');

    // pages
    $router->get('/pages', 'App\Admin\Controllers\PageController@default');

    // news
    $router->get('/news', 'App\Admin\Controllers\NewController@default');

    // albums
    $router->get('/albums', 'App\Admin\Controllers\AlbumController@default');

    // polls
    $router->get('/polls', 'App\Admin\Controllers\PollController@default');

    // files
    $router->get('/documents', 'App\Admin\Controllers\DocumentController@default');

});
