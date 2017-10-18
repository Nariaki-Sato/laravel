<?php
# Top page '/'
Route::get('/', function () {
    # /resources/views/welcome.blade.phpを表示
    return view('welcome');
});

use App\Http\Middleware\HelloMiddleware;

# Hello page '/hello'
Route::get('hello', 'HelloController@index');
Route::post('hello', 'HelloController@post');


