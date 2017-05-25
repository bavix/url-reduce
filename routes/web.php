<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('new'));
});

// news
Route::get('/news', 'NewController@index')
    ->name('new');

Route::get('/new/category/{id}-{title}', 'NewController@index')
    ->name('new.category');

Route::get('/new/{id}-{title}.html', 'NewController@view')
    ->name('new.view');

// pages
Route::get('/pages', 'PageController@index')
    ->name('page');

Route::get('/page/{id}-{title}.html', 'PageController@view')
    ->name('page.view');

// polls
Route::get('/polls', 'PollController@index')
    ->name('poll');

Route::get('/poll/{id}-{title}.html', 'PollController@view')
    ->name('poll.view');

Route::post('/poll/{id}-{title}.html', 'PollController@view')
    ->name('poll.view');

// albums
Route::get('/albums', 'AlbumController@index')
    ->name('album');

Route::get('/album/{id}-{title}.html', 'AlbumController@view')
    ->name('album.view');

// statement
Route::get('/statement', 'StatementController@index')
    ->name('statement');

// statement
Route::get('/visually', 'VisuallyController@index')
    ->name('visually');

// statement
Route::get('/visually/image', 'VisuallyController@image')
    ->name('visually.image');
