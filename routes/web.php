<?php

    use Illuminate\Support\Facades\Route;

    //force HTTPS
    // if (env('APP_ENV') === 'local') {
        // URL::forceScheme('https');
    // }

    // setlocale(LC_TIME, 'id');

    Route::get('/', function () {
        return view('auth.login');
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




    // MASTER
    //MY
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

    //LAINYA
    Route::get('/master/admindosen', 'Master\AdminDosenController@index')->name('master.admindosen')
    ->middleware(['role:Super Admin|Kajur|Admin','auth']);
    
    Route::get('/master/matakuliah', 'Master\MatakuliahController')->name('master.matakuliah')
    ->middleware(['role:Super Admin|Kajur|Kaprodi|Admin','auth']);






    // MAHASISWA
    //.my LIVEWIRE CRUD
    // Route::livewire('/kegiatan/my', 'mykegiatan')
    // ->layout('layouts-auth.app')
    // ->name('kegiatan.my');
    Route::get('/mahasiswa', 'Datamahasiswa\MahasiswaController@tampilMahasiswaPA')->name('mahasiswa.pa')
    ->middleware(['role:Dosen','auth']);
    Route::get('/mahasiswa/all', 'Datamahasiswa\MahasiswaController@index')->name('mahasiswa.all')
    ->middleware(['role:Dosen|Kajur|Kaprodi|Admin|Super Admin','auth']);
    Route::get('/mahasiswa/profil/{id}', 'Datamahasiswa\MahasiswaController@tampilProfil')->name('mahasiswa.profil')
    ->middleware(['role:Dosen|Kajur|Kaprodi|Admin|Super Admin','auth']);
    Route::get('/mahasiswa/profil/{id}/resetPassword', 'Datamahasiswa\MahasiswaController@resetPassword')->name('mahasiswa.profil.resetpassword')
    ->middleware(['role:Dosen|Kajur|Kaprodi|Admin|Super Admin','auth']);
    Route::get('/mahasiswa/akademik/{id}', 'Datamahasiswa\AkademikController@tranksripShow')->name('akademik.lihat')
    ->middleware(['role:Dosen|Kajur|Kaprodi|Admin|Super Admin','auth']);









    // IMPORT
    Route::get('/import', 'ImportController@index')->name('import')
    ->middleware(['role:Kajur|Kaprodi|Admin|Super Admin','auth']);
    Route::post('/import/process', 'ImportController@posthtml')->name('posthtml')
    ->middleware(['role:Kajur|Kaprodi|Admin|Super Admin','auth']);







    //REKOMENDASI
    // Route::livewire('/rekomendasi/masterkriteria', 'rekomendasi.masterkriteria')
    // ->layout('layouts-auth.app')
    // ->name('masterkriteria');
    Route::get('/rekomendasi/masterkriteria', 'Rekomendasi\MasterKriteriaController@index')->name('masterkriteria')
    ->middleware(['role:Dosen|Kajur|Kaprodi|Admin|Super Admin','auth']);
    Route::get('/rekomendasi/masterpreferensi', 'Rekomendasi\MasterPreferensiController@index')->name('masterpreferensi')
    ->middleware(['role:Dosen|Kajur|Kaprodi|Admin|Super Admin','auth']);
    Route::get('/rekomendasi/masterpreferensi/input', 'Rekomendasi\MasterPreferensiController@tambah')->name('masterpreferensi.tambah')
    ->middleware(['role:Dosen|Kajur|Kaprodi|Admin|Super Admin','auth']);
    // ->middleware(['role:Mahasiswa','auth']);

    Route::get('/rekomendasi/otomatis', 'Rekomendasi\RekomendasiOtomatisController@index')->name('rekomendasi.otomatis')
    ->middleware(['role:Dosen|Kajur|Kaprodi','auth']);//Admin|Super Admin










    //coba
    Route::get('/contoh', function () {
        return view('contoh');
    });
    Route::get('/test', 'KikiTestController@index')->name('test');
    Route::get('/test/satu', 'KikiTestController@uploadsatu')->name('uploadsatu');
    Route::post('/test/satu/post-html', 'KikiTestController@postsatu')->name('postsatu');