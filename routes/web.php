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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    //NewsController
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create');
    Route::get('news', 'Admin\NewsController@index');
    Route::get('news/edit', 'Admin\NewsController@edit');
 });
//Route::get('admin/news/create', 'Admin\NewsController@add'); この書き方でもおっけい
// グループ化することで複数行うことができて便利でわかりやすい

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
       //ProfileController
       Route::get('profile/create', 'Admin\ProfileController@add');
       Route::get('profile/edit', 'Admin\ProfileController@edit');
       Route::post('profile/create', 'Admin\ProfileController@create');
       Route::get('profile/index', 'Admin\ProfileController@index');
});
// NewsControllerのgroupの中に入れることはできるのか？


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


