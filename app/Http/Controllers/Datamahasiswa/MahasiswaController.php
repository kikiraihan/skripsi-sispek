<?php

namespace App\Http\Controllers\Datamahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function tampilMahasiswaPA()
    {
        $komponen="mahasiswaPA";
        return view('page.Datamahasiswa.main', compact(['komponen']));
    }


    public function tampilProfil($id)
    {

        $user=Mahasiswa::find($id)->user;


        return view('page.profile', compact(['user']));
    }
}
