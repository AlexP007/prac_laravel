<?php

Route::post('/register', 'UserController@create');
Route::post('/logout', 'UserController@logout')->middleware('auth.user');