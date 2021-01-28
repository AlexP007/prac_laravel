<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Apartment
Route::get('/apartments/all', 'ApartmentController@all');
Route::middleware('auth.check')->group(function() {
    Route::resource('apartments', 'ApartmentController')->except(['create', 'edit']);
    Route::post('/apartments/{apartment}/image', 'ApartmentController@imageSave');
});
