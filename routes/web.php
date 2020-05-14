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

//3.「http://XXXXXX.jp/XXX というアクセスが来たときに、 AAAControllerのbbbというAction に渡すRoutingの設定」
Route::get('xxx/AAA/bbb', 'xxx\AAAController@bbb');

//4.

Route::group(['prefix' => 'admin'], function(){
  Route::get('news/create', 'admin\NewsController@add');
  Route::get('profile/create', 'admin\ProfileController@add');
  Route::get('profile/edit', 'admin\profileController@edit');
});
