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
        Route::get('login', 'Admin@Login');

        # 后台管理员注册
        Route::post('register', 'Admin@Register');


    }

);

#标签的路由
Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin'
    ],

    function () {
        Route::group(
            [
                'prefix' => 'label',
            ],
            function () {
                # 文章标签的添加
                Route::post('add', 'Labels@add');

                # 后台标签修改
                Route::post('edit', 'Labels@edit');

                # 后台标签删除
                Route::post('delete', 'Labels@delete');

                # 后台标签展示
                Route::get('list', 'Labels@list');
            }
        );
    }
);

#标签的路由
Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin'
    ],

    function () {
        Route::group(
            [
                'prefix' => 'cate',
            ],
            function () {
                # 文章栏目的添加
                Route::post('add', 'Cate@add');

                # 后台栏目修改
                Route::post('edit', 'Cate@edit');

                # 后台栏目删除
                Route::post('delete', 'Cate@delete');

                # 后台栏目展示
                Route::get('list', 'Cate@list');
            }
        );
    }
);

#文章的路由
Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin'
    ],

    function () {
        Route::group(
            [
                'prefix' => 'article',
            ],
            function () {
                # 后台文章的添加
                Route::post('add', 'Articles@add');

                # 后台文章修改
                Route::post('edit', 'Articles@edit');

                # 后台文章删除
                Route::post('delete', 'Articles@delete');

                # 后台文章展示
                Route::get('list', 'Articles@list');
            }
        );
    }
);
