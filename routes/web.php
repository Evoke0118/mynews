<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'admin'], function() {
    Route::get('news/create', 'Admin\NewsController@add');
  });
//Route::get('admin/news/create', 'Admin\NewsController@add'); この書き方でもおっけい
// グループ化することで複数行うことができて便利でわかりやすい

Route::group(['prefix' => 'admin'], function() {
    Route::get('news/edit', 'Admin\ProfileController@edit');
    Route::get('news/delete', 'Admin\ProfileController@delete');
});
// NewsControllerのgroupの中に入れることはできるのか？



