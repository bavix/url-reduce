<?php

Route::get('/', 'NewController@index');
Route::get('/new/{id}-{title}.html', 'NewController@view');

Route::get('/polls', 'PollController@index');
Route::get('/poll/{id}-{title}.html', 'PollController@view');

//Route::get('/', 'NewController@index');
//Route::get('/new/{id}-{title}.html', 'NewController@view');
