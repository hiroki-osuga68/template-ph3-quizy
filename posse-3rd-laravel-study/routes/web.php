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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// トップビュー：タイトル一覧ページ
Route::get('/', 'QuizyController@index')->name('index');
// 都道府県ごとの問題ページ
Route::get('/quiz/{id}', 'QuizyController@page')->name('page');

// 管理画面
// タイトル管理
Route::prefix('edit_title')->group(function () {
    Route::get('/', 'AdmintitleController@index')->name('edit_title.index');
    Route::post('/', 'AdmintitleController@store')->name('edit_title.store');
    // 編集ルーティング
    Route::get('/edit/{id}', 'AdmintitleController@edit')->name('edit_title.edit');
    Route::post('/update/{id}', 'AdmintitleController@update')->name('edit_title.update');
    Route::post('/destroy/{id}', 'AdmintitleController@destroy')->name('edit_title.destroy');
});

// 設問管理
Route::prefix('edit_question')->group(function () {
    Route::get('/{id}', 'AdminquestionController@index')->name('edit_question.index');
    Route::post('/{id}', 'AdminquestionController@store')->name('edit_question.store');
    // 編集ルーティング
    Route::get('/edit/{id}', 'AdminquestionController@edit')->name('edit_question.edit');
    Route::post('/update/{id}', 'AdminquestionController@update')->name('edit_question.update');
    Route::post('/destroy/{id}', 'AdminquestionController@destroy')->name('edit_question.destroy');
});
