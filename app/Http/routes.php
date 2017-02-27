<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['prefix'=>'admin','middleware'=>'admin'], function(){
	Route::get('', function() {
	    return view('admin.index');
	});
	Route::get('/vl', function() {
	    return view('admin.vl');
	});
	Route::get('/dashboard', 'DashboardController@index');
	Route::get('/users', 'UserController@listUser');
});

Route::post('/register2', 'UserController@register2');