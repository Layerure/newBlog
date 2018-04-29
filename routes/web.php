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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin'
    ],

    function () {

        # 后台管理员登录
        Route::post('login', 'Admin@Login');

        # 后台管理员注册
        Route::post('register', 'Admin@Register');


    }

);
