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

//后台登录页面
Route::get('admin/login','Admin\LoginController@index');

//后台主页
Route::get('admin/index','Admin\IndexController@index');


//网站设置
Route::get('admin/system','Admin\SystemController@index');


//网站幻灯片
Route::resource('admin/image','Admin\ImageController');//资源路由不用加index

//留言管理
Route::get('admin/comment','Admin\CommentController@index');

//文章管理
Route::resource('admin/article','Admin\ArticleController');//资源路由不用加index

//分类管理
Route::resource('admin/cate','Admin\CateController');//资源路由不用加index

//用户管理
Route::get('admin/pass','Admin\UserController@pass');
Route::get('admin/user','Admin\UserController@index');
