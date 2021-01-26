<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    dd(User::where('api_token', '40VY4azHcsk3Ktmav1ElWWA04pmvjucgwOrbGeXh7efbFND5Vmx91lr4w6mc')->first());
});
