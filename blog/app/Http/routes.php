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

Route::group(['middle' => ['web']], function(){
	//Category
	Route::resource('category', 'CategoryController', ['except' => ['create']]);

	//Tag
	Route::resource('tags', 'TagController', ['except' => ['create']]);

	//blog
	Route::get('blog/{slug}',['as' => 'blog.single', 'uses' => 'BlogController@getSingle']);
	Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);

	//Contact Form
	Route::post('contact', 'PagesController@postContact');

	//Comment
	// Comments
	Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
	Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
	Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
	Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
	Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);

	//Posts
	Route::resource('posts', 'PostsController');
	Route::get('/', 'PagesController@getIndex');
	Route::get('/about', 'PagesController@getAbout');
	Route::get('/contact', 'PagesController@getContact');
	Route::auth();

	Route::get('/home', 'HomeController@index');

});
