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

//Auth::routes();

Route::post('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);

Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

Route::post('/message', ['as' => 'message', 'uses' => 'MessageBoardController@message']);

Route::post('/response', ['as' => 'response', 'uses' => 'MessageBoardController@response']);

Route::post('/delete/{id}', ['as' => 'delete', 'uses' => 'MessageBoardController@delete']);

Route::get('/board_notice', ['as' => 'board_notice', 'uses' => 'MessageBoardController@board_notice']);

Route::get('/page/{page?}', ['as' => 'page', 'uses' => 'MessageBoardController@page']);

Route::get('/{board_kind?}', ['as' => 'index', 'uses' => 'MessageBoardController@index']);


Route::get('/get_captcha/{config?}', function (\Mews\Captcha\Captcha $captcha, $config = 'default') {
    return $captcha->src($config);
});

Route::get('/home', 'HomeController@index')->name('home');
