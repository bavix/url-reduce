<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'ShorterController@index')
    ->name('home');

Route::post('/', 'ShorterController@store')
    ->name('shorter.store');

Route::get('/language', 'LanguageController@change')
    ->name('language');

// seo
Route::get('/s/{hash}', function (\Illuminate\Http\Request $request) {
    return redirect(
        route('shorter', $request->route()->parameters()),
        301
    );
});

Route::get('/{hash}', 'ShorterController@hash')
    ->where('hash', '\w{5}')
    ->name('shorter');

Route::get('/qr/{hash}', 'QRController@index')
    ->where('hash', '\w{5}')
    ->name('qr');

Route::get('/{friendly}.html', 'PageController@index')
    ->name('page');

// report
Route::post('/report', 'FeedbackController@report')
    ->name('report');

// feedback
Route::get('/feedback', 'FeedbackController@index')
    ->name('feedback');

// feedback store
Route::post('/feedback', 'FeedbackController@store')
    ->name('feedback.store');

Route::get('/tracker.png', 'TrackerController@index')
    ->name('tracker');

Route::get('/statistics.html', 'TrackerController@statistics')
    ->name('statistics');
