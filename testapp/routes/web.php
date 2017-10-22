<?php

use App\Http\Middleware\MyMiddleware;

# Top page /resources/views/welcome.blade.phpを表示
Route::get('/', function () { return view('welcome'); });

### Practice

#user
Route::get('user', 'UserController@index'); 						# Index
Route::get('user/new', 'UserController@new');						# New
Route::post('user/new', 'UserController@create');				# Create
Route::get('user/edit', 'UserController@edit');					# Edit
Route::post('user/edit', 'UserController@update');			# Update
Route::post('user/destroy', 'UserController@destroy');	# Destroy

Route::get('user/{id?}', 'UserController@show'); 				# Show




# ===========================================================================

#database
Route::get('practice', 'MyController@index');
Route::get('practice/new', 'MyController@new');
Route::post('practice/database', 'MyController@create');

#cookie
Route::get('practice/cookie', 'MyController@cookie');
Route::post('practice/cookie', 'MyController@post_cookie');

#child
Route::get('practice/child', 'MyController@child')->middleware(MyMiddleware::class);

#validation test
Route::get('practice/validation', 'MyController@validation');
Route::post('practice/validation', 'Mycontroller@post_validation');

#basic
Route::get('practice/{id?}', 'MyController@index');
Route::post('practice', 'MyController@post');

# ===========================================================================

# Hello page '/hello'
# Route::get('hello', 'HelloController@index');
# Route::post('hello', 'HelloController@post');
