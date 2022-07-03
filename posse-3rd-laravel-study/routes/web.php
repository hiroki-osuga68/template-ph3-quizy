<?php
// ファサードの追加
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// ファサードのメリット・・クラスをインスタンス化しなくてもstaticメソッドのようにメソッドを実行できる
// ※ファサードも内部的には、DBクラスがインスタンス化されて、そのインスタンスメソッドであるtableが呼ばれているので、記述は::だが静的メソッドではない

// 通常
// $db = new DB();
// $db->table();

// ファサード利用
// DBクラス・・Illuminate\Support\Facades\Facadeクラスを継承したクラスとして定義される

// DB::table();・・・・(new DB())->table();と等価

// ファサードでtableメソッドを呼び出した時、指定したテーブルの「ビルダ」を取得でき、クエリビルダのメソッドが自由に使えるようになる
// DB::table('テーブル名')->メソッド()のように記述する。


// ※Eloquentの利用
// Userモデルクラス・・Illuminate\Database\Eloquent\ModelのModelクラスを継承したクラスとして定義される

// User::find(1);・・・・(new User())->find(1);と等価（findはクエリビルダのメソッド）

// Eloquentではtableメソッドを記述せずともクエリビルダを利用することができる

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

// 管理画面
Route::prefix('edit_title')->group(function () {
Route::get('/', 'AdmintitleController@index')->name('edit_title.index');
Route::post('/', 'AdmintitleController@store')->name('edit_title.store');
// 編集ルーティング
Route::get('/edit/{id}','AdmintitleController@edit')->name('edit_title.edit');
Route::post('/update/{id}','AdmintitleController@update')->name('edit_title.update');
});