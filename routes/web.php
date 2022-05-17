<?php

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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    Route::get('/', 'HomeController@index')->name('homepage');
    Route::get('/register', 'RegisterController@show')->name('register.show');
    Route::post('/register', 'RegisterController@register')->name('register.perform');
    Route::post('/login', 'LoginController@login')->name('do_login');

    Route::group(['middleware' => ['auth']], function() {
        Route::post('/logout', 'LogoutController@perform')->name('do_logout');
        Route::get('/share', 'HomeController@share')->name('home.share');
        Route::post('/updateVideo', 'HomeController@updateVideo')->name('updateVideo');
    });
});
