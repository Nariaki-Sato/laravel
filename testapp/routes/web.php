<?php

# Top page
Route::get('/', function () {
    # /resources/views/welcome.blade.phpを表示
    return view('welcome');
});

use App\Http\Middleware\MyMiddleware;

# Hello page '/hello'
# Route::get('hello', 'HelloController@index');
# Route::post('hello', 'HelloController@post');

### Practice

#database
Route::get('practice/database', 'Mycontroller@database');

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




