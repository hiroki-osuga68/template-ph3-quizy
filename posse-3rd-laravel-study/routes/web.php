<?php
// ファサードの追加
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// トップビュー：タイトル一覧ページ
Route::get('/', 'QuizyController@index')->name('index');
// 都道府県ごとの問題ページ
Route::get('/quiz/{id}', 'QuizyController@page')->name('page');
