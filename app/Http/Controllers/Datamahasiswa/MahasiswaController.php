<?php

namespace App\Http\Controllers\Datamahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\User;
use auth;

class MahasiswaController extends Controller
{

    public function index()
    {
        $komponen="mahasiswaall";
        return view('page.Datamahasiswa.main', compact(['komponen']));
    }


    public function tampilMahasiswaPA()
    {
        $komponen="mahasiswaPA";
        return view('page.Datamahasiswa.main', compact(['komponen']));
    }


    public function tampilProfil($id)
    {

        $author=auth::user();
        $user=Mahasiswa::find($id)->user;

        if ($author->hasRole('Mahasiswa') and ($user->id!=$author->id))
        {
            return abort(404);
        }
        elseif ($author->isHanyaDosen() and ($user->mahasiswa->id_dosen_pa!=$author->dosen->id))
        {
            return abort(404);
        }
        elseif(
            $author->isDosenKaprodi() and
            ($user->mahasiswa->prodi!=$author->dosen->kaprodi->prodi) and
            $user->mahasiswa->id_dosen_pa!=$author->dosen->id
            )
        {
            return abort(404);
        }
        elseif($author->isDosenKajur())'kajur bebas';



        return view('page.profile', compact(['user']));
    }


    public function resetPassword($id)
    {
        $user           = User::find($id);
        $user->password ="password";
        // dd($user->password);
        $user->save();
        return redirect()->back()->with('passwordReseted','password berhasil direset!');
    }


    // kalau kajur tidak ada validasi,tampilkan semuanya

    //kalau mahasiswa hanya tampilkan jika idnya sama dengan id dia

    //kalau dosen hanya tampilkan jika id dosen panya sama dengan id dia

    // if ($user->hasRole('Dosen'))
    // {
    //     if ($user->id_dosen_pa==)
    // }
}
