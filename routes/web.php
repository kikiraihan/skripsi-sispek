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



// MAHASISWA
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

Route::get('/mahasiswa', 'Datamahasiswa\MahasiswaController@tampilMahasiswaPA')->name('mahasiswa.pa')
->middleware(['role:Dosen','auth']);
Route::get('/mahasiswa/profil/{id}', 'Datamahasiswa\MahasiswaController@tampilProfil')->name('mahasiswa.profil')
->middleware(['role:Dosen|Kajur|Kaprodi|Admin','auth']);
Route::get('/mahasiswa/akademik/{id}', 'Datamahasiswa\AkademikController@tranksripShow')->name('akademik.lihat')
->middleware(['role:Dosen|Kajur|Kaprodi|Admin','auth']);









// IMPORT
Route::get('/import', 'ImportController@index')->name('import');
Route::post('/import/process', 'ImportController@posthtml')->name('posthtml');





//REKOMENDASI
// Route::livewire('/rekomendasi/masterkriteria', 'rekomendasi.masterkriteria')
// ->layout('layouts-auth.app')
// ->name('masterkriteria');
Route::get('/rekomendasi/masterkriteria', 'Rekomendasi\MasterKriteriaController@index')->name('masterkriteria');
Route::get('/rekomendasi/masterpreferensi', 'Rekomendasi\MasterPreferensiController@index')->name('masterpreferensi');
Route::get('/rekomendasi/masterpreferensi/input', 'Rekomendasi\MasterPreferensiController@tambah')->name('masterpreferensi.tambah');
// ->middleware(['role:Mahasiswa','auth']);


Route::get('/rekomendasi/otomatis', 'Rekomendasi\RekomendasiOtomatisController@index')->name('rekomendasi.otomatis');









//coba
Route::get('/contoh', function () {
    return view('contoh');
});
Route::get('/test', 'KikiTestController@index')->name('test');
Route::get('/test/satu', 'KikiTestController@uploadsatu')->name('uploadsatu');
Route::post('/test/satu/post-html', 'KikiTestController@postsatu')->name('postsatu');