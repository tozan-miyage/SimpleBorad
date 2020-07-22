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
// URLで'/'でアクセスされたら、viewフォルダのwelcome.blade.phpを表示する
// Route::get('/', function () {
//     return view('welcome');
// });
// URLで'/'でアクセスされたら、PostControllerのindex()メソッドを実行する
Route::get('/','PostController@index');

//URLで'/posts'でアクセスされたら、PostControllerのindex()を実行
Route::resource('posts','PostController');

// 以下の部分はHTTPS接続でアセット(CSSや画像など)を読み込むための処理。
if (env('APP_ENV') === 'local'){
    URL::forceScheme('https');
}