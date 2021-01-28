<?php

Route::post('/register', 'UserController@create');
Route::post('/login', 'UserController@login');
Route::post('/update', 'UserController@update')->middleware(['auth.check' ,'auth.user']);
Route::post('/logout', 'UserController@logout')->middleware(['auth.check' ,'auth.user']);
