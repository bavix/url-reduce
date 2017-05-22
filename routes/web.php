<?php

Route::get('/', 'HomeController@index');

Route::get('/new/{id}-{title}.html', 'NewController@view');
