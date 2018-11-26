<?php

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


Route::get('/', function () 
{
return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('Application','ApplicationController');

/* View Composer*/
/*View::composer(['*'], function($view){
    
    $user = Auth::user();
    $view->with('user',$user);
    
});
*/


Route::group([
        'middleware' => 'auth'
    ], function() {

    	Route::resource('Application','ApplicationController', ['only' => ['index','create','store','edit','update','destroy']]);

        Route::resource('Users','UsersController',['only'=>['edit','update','destroy']]);

        Route::post('profile/update','ProfileController@update_profile')->name('profile.update');

        Route::get('profiles','ProfileController@index')->name('profiles');
        Route::get('logout','Auth\LoginController@logout')->name('logout');

    });

