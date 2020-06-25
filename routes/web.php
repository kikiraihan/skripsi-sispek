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



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



//.my

// Route::livewire('/kegiatan/my', 'mykegiatan')
// ->layout('layouts-auth.app')
// ->name('kegiatan.my');
Route::get('/kegiatan/my', 'Datamahasiswa\KegiatanController@my')->name('kegiatan.my');




Route::get('/ormawa/my', 'Datamahasiswa\OrmawaController@my')->name('ormawa.my');
Route::get('/prestasi/my', 'Datamahasiswa\PrestasiController@my')->name('prestasi.my');
Route::get('/biodata/my', 'Datamahasiswa\BiodataController@edit')->name('biodata.my');
Route::get('/orangtua/my', 'Datamahasiswa\OrangtuaController@my')->name('orangtua.my');
Route::get('/saudara/my', 'Datamahasiswa\SaudaraController@my')->name('saudara.my');


// IMPORT
Route::get('/import', 'ImportController@index')->name('import');
Route::post('/import/process', 'ImportController@posthtml')->name('posthtml');






//coba
Route::get('/contoh', function () {
    return view('contoh');
});
Route::get('/test/satu', 'KikiTestController@uploadsatu')->name('uploadsatu');
Route::post('/test/satu/post-html', 'KikiTestController@postsatu')->name('postsatu');
Route::get('/test', 'KikiTestController@index')->name('test');