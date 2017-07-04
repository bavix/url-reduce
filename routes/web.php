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

// news
Route::paginate('/news', 'NewController@index')
    ->name('new');

Route::get('/new/category/{id}-{title}', 'NewController@index')
    ->name('new.category');

Route::get('/new/preview/{id}-{title}.html', 'NewController@preview')
    ->name('new.preview');

Route::get('/new/{id}-{title}.html', 'NewController@view')
    ->name('new.view');

// pages
Route::paginate('/pages', 'PageController@index')
    ->name('page');

Route::get('/page/preview/{id}-{title}.html', 'PageController@preview')
    ->name('page.preview');

Route::get('/page/{id}-{title}.html', 'PageController@view')
    ->name('page.view');

// polls
Route::paginate('/polls', 'PollController@index')
    ->name('poll');

Route::get('/poll/preview/{id}-{title}.html', 'PollController@preview')
    ->name('poll.preview');

Route::get('/poll/{id}-{title}.html', 'PollController@view')
    ->name('poll.view');

Route::post('/poll/{id}-{title}.html', 'PollController@view')
    ->name('poll.view');

// albumsHome
Route::paginate('/albums', 'AlbumController@index')
    ->name('album');

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

Route::get('/cookie-permission.json', 'VisuallyController@cookiePermission')
    ->name('cookie.permission');

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
