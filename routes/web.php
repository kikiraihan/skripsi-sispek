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

// setlocale(LC_TIME, 'id');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contoh', function () {
    return view('contoh');
});


Route::get('/test/satu', 'KikiTestController@uploadsatu')->name('uploadsatu');
Route::post('/test/satu/post-html', 'KikiTestController@postsatu')->name('postsatu');

Route::get('/test', 'KikiTestController@index')->name('test');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




// IMPORT
Route::get('/import', 'ImportController@index')->name('import');
Route::post('/import/process', 'ImportController@posthtml')->name('posthtml');
