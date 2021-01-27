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

Route::get('/test', fn() => ['success' => true]);

// Apartment
Route::resource('apartment', 'ApartmentController')->except(['create', 'edit', 'show']);
Route::post('/apartment/{apartment}/image', 'ApartmentController@imageSave');
