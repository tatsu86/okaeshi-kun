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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function() {
  //イベント
  Route::get('event/list', 'EventController@index')->name('event.list');
  Route::get('event/detail', 'EventController@detail')->name('event.detail');
  Route::post('event/save', 'EventController@save')->name('event.save');
  Route::delete('event/delete', 'EventController@delete')->name('event.delete');

  //祝ってくれ た人
  Route::get('celebrater/list', 'CelebraterController@index')->name('celebrater.list');
  Route::get('celebrater/detail', 'CelebraterController@detail')->name('celebrater.detail');
  Route::post('celebrater/save', 'CelebraterController@save')->name('celebrater.save');
  Route::delete('celebrater/delete', 'CelebraterController@delete')->name('celebrater.delete');

  //祝い内容
  Route::get('celebration/list', 'CelebrationController@index')->name('celebration.list');
  Route::get('celebration/detail', 'CelebrationController@detail')->name('celebration.detail');
  Route::post('celebration/save', 'CelebrationController@save')->name('celebration.save');
  Route::delete('celebration/delete', 'CelebrationController@delete')->name('celebration.delete');

  //ヘルプ
  Route::get('help/list', 'HelpController@index')->name('help.list');

});
