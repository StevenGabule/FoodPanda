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
Route::get('foods', 'FoodController@index');
Route::get('restaurants', 'HomeController@index');
Route::get('restaurant/{slug}', 'HomeController@showRestaurant');

Route::group(['middleware' => ['guest:api']], static function() {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');
});

Route::group(['middleware' => ['auth:api']], function () {
   Route::post('logout', 'Auth\LoginController@logout');
});

Route::post('me', 'User\MeController@getMe');
