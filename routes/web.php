<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PageController@main')->name('home');

$url = preg_replace(
    '~(\w+://)~',
    'special.',
    env('APP_URL')
);

Route::domain($url)->group(function () {
    if (!visually()) {
        Route::get(
            request()->server('REQUEST_URI'),
            'VisuallyController@index'
        );
    }
});

// posts
Route::paginate('/posts', 'PostController@index')
    ->name('post');

Route::paginate('/post/search/{query?}', 'PostController@search')
    ->name('post.search');

Route::get('/post/category/{id}-{title}', 'PostController@index')
    ->name('post.category');

Route::get('/post/preview/{id}-{title}.html', 'PostController@preview')
    ->name('post.preview');

Route::get('/post/{id}-{title}.html', 'PostController@view')
    ->name('post.view');

// pages
Route::paginate('/pages', 'PageController@index')
    ->name('page');

Route::paginate('/page/search/{query?}', 'PageController@search')
    ->name('page.search');

Route::get('/page/preview/{id}-{title}.html', 'PageController@preview')
    ->name('page.preview');

Route::get('/page/{id}-{title}.html', 'PageController@view')
    ->name('page.view');

// polls
Route::paginate('/polls', 'PollController@index')
    ->name('poll');

Route::paginate('/poll/search/{query?}', 'PollController@search')
    ->name('poll.search');

Route::get('/poll/preview/{id}-{title}.html', 'PollController@preview')
    ->name('poll.preview');

Route::get('/poll/{id}-{title}.html', 'PollController@view')
    ->name('poll.view');

Route::post('/poll/{id}-{title}.html', 'PollController@view')
    ->name('poll.view');

// albumsHome
Route::paginate('/albums', 'AlbumController@index')
    ->name('album');

Route::paginate('/album/search/{query?}', 'AlbumController@search')
    ->name('album.search');

Route::get('/album/preview/{id}-{title}.html', 'AlbumController@preview')
    ->name('album.preview');

Route::get('/album/{id}-{title}.html', 'AlbumController@view')
    ->name('album.view');

// statement
Route::get('/statement', 'StatementController@index')
    ->name('statement');

// statement store
Route::post('/statement', 'StatementController@store')
    ->name('statement.store');

// feedback
Route::get('/feedback', 'FeedbackController@index')
    ->name('feedback');

// feedback store
Route::post('/feedback', 'FeedbackController@store')
    ->name('feedback.store');

// слабовидящих
Route::get('/visually', 'VisuallyController@index')
    ->name('visually');

// слабовидящих (выкл. image)
Route::get('/visually/image', 'VisuallyController@image')
    ->name('visually.image');

// слабовидящих (выкл. font)
Route::get('/visually/font/{size}', 'VisuallyController@font')
    ->name('visually.font');

// слабовидящих (выкл. color)
Route::get('/visually/color/{color}', 'VisuallyController@color')
    ->name('visually.color');

Route::post('/notify/{id}', 'VisuallyController@notify')
    ->name('notify');

Route::get('/tracker.png', 'TrackerController@index')
    ->name('tracker');

Route::get('/statistics.html', 'TrackerController@statistics')
    ->name('statistics');

Route::get('/qr/{hash}', 'QRController@index')
    ->name('qr');

Route::get('/s/{hash}', 'ShorterController@index')
    ->name('shorter');

Route::get('/contact.html', 'ContactController@index')
    ->name('contact');

if (env('APP_DEBUG'))
{
    Route::get('/debug', 'DebugController@index')
        ->name('debug');
}

Auth::routes();

// todo
Route::get('/user', 'UserController@index')->name('user');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
