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

/*Route::get('/', function () {
    return view('welcome');
});*/

//后台登录页面
Route::get('admin/login','Admin\LoginController@index');
Route::post('admin/toLogin','Admin\LoginController@login');
Route::get('admin/toLogout','Admin\LoginController@logout');
Route::post('admin/checkPass','Admin\LoginController@checkPass')->middleware('login');

//后台主页
Route::get('admin/index','Admin\IndexController@index')->middleware('login');


//网站设置
Route::get('admin/system','Admin\SystemController@index')->middleware('login');
//网站设置-修改
Route::get('admin/system/edit','Admin\SystemController@edit')->middleware('login');
Route::post('admin/system/update','Admin\SystemController@update')->middleware('login');


//网站幻灯片
Route::resource('admin/image','Admin\ImageController')->middleware('login');//资源路由不用加index
//上传图片
Route::post('admin/upload','Admin\ImageController@upload');


//留言管理
Route::get('admin/comment','Admin\CommentController@index');

//文章管理
Route::resource('admin/article','Admin\ArticleController')->middleware('login');//资源路由不用加index

//分类管理
Route::resource('admin/cate','Admin\CateController');//资源路由不用加index

//用户管理

//修改密码页面+修改密码
Route::match(['get','post'],'admin/pass','Admin\UserController@pass');

Route::get('admin/user','Admin\UserController@index');

//--------------------------以下为前台

/*前台首页*/
Route::get('/','Home\IndexController@index');

//文章列表
Route::get('article/index','Home\ArticleController@index');
Route::get('article/detail/{id}','Home\ArticleController@detail')->where('id','\d+');

//用户登录注册
Route::match(['post','get'],'login','Home\UserController@login');
Route::match(['post','get'],'register','Home\UserController@register');
Route::get('logout','Home\UserController@logout');

//检测用户名唯一性
Route::post('checkUser','Home\UserController@checkUser');

Route::get('cate/{id}','Home\CateController@index')->where('id','\d+');



