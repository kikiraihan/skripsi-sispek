<?php

use Illuminate\Support\Facades\Route;

//force HTTPS
// if (env('APP_ENV') === 'local') {
    // URL::forceScheme('https');
// }

// setlocale(LC_TIME, 'id');

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home/password/update', 'HomeController@passwordUpdate')->name('password-update');
// Route::post('/home/avatar/update', 'HomeController@avatarUpdate')->name('password-update');

Route::get('/biodata/my', 'Datamahasiswa\BiodataController@edit')->name('biodata.my')
->middleware(['role:Mahasiswa','auth']);
Route::post('/biodata/my/update', 'Datamahasiswa\BiodataController@update')->name('biodata.my.update')
->middleware(['role:Mahasiswa','auth']);



//.my LIVEWIRE CRUD
// Route::livewire('/kegiatan/my', 'mykegiatan')
// ->layout('layouts-auth.app')
// ->name('kegiatan.my');
Route::get('/kegiatan/my', 'Datamahasiswa\KegiatanController@my')->name('kegiatan.my')
->middleware(['role:Mahasiswa','auth']);
Route::get('/ormawa/my', 'Datamahasiswa\OrmawaController@my')->name('ormawa.my')
->middleware(['role:Mahasiswa','auth']);
Route::get('/prestasi/my', 'Datamahasiswa\PrestasiController@my')->name('prestasi.my')
->middleware(['role:Mahasiswa','auth']);
Route::get('/orangtua/my', 'Datamahasiswa\OrangtuaController@my')->name('orangtua.my')
->middleware(['role:Mahasiswa','auth']);
Route::get('/saudara/my', 'Datamahasiswa\SaudaraController@my')->name('saudara.my')
->middleware(['role:Mahasiswa','auth']);
Route::get('/akademik/my', 'Datamahasiswa\AkademikController@myTranskrip')->name('akademik.my')
->middleware(['role:Mahasiswa','auth']);



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