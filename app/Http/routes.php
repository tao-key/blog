<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function() {
	return view('home', 'HomeController@index');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function() {
    //
});

Route::group(['middleware' => 'web'], function() {
	Route::auth();
	Route::get('home', 'HomeController@index');
	Route::get('/', 'HomeController@index');

    //PROFIL
	Route::group(['prefix' => 'profil'], function() {
		Route::get('{id}', 'ProfilController@index');
		Route::get('edit/{id}', 'ProfilController@edit');
		Route::post('update/{id}', 'ProfilController@update');
		Route::post('delete/{id}', 'ProfilController@destroy');
	});

    //ARTICLES
	Route::group(['prefix' => 'article'], function() {
		Route::post('post', 'ArticleController@store');

		//COMMENT
		Route::get('post/{id}', 'ArticleController@showArticle');
	});

	//COMMENTAIRE
	Route::post('comment/post/{id}', 'CommentController@store');
});
