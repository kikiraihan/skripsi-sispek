<?php

namespace App\Http\Controllers\Datamahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use auth;
Use Alert;


class BiodataController extends Controller
{
    public function edit()
    {
        $user=auth::user();
        return view('page.Datamahasiswa.editBio', compact(['user']));
    }

    public function update(Request $request)
    {
        //validasi
        $CustomMessages = [
            'integer' => 'Kolom :attribute, harus berupa angka',
            'string' => 'Kolom :attribute, harus berupa angka',
            'date' => 'Kolom :attribute, harus berupa tanggal',
            'required'=>'Kolom :attribute tidak boleh kosong',
            'unique'=>'Data kolom :attribute sudah ada sebelumnya'
        ];

        $ini=$request->validate( [

            'email'             =>"required|email",

            'nama'              =>"required|string",
            'nim'               =>"required|string",
            'tgl_lahir'         =>"required|date",
            'tempat_lahir'      =>"required|string",
            'jenis_kelamin'     =>"required|string|in:Laki-Laki,Perempuan",
            'golongan_darah'    =>"required|string|in:O,A,A+,B,B+,AB",
            'agama'             =>"required|string|in:Islam,Kristen,Katolik,Konghuchu,Hindu,Budha,Lainnya",
            'status_menikah'    =>"required|string|in:1,0",
            'no_ktp'            =>"required|string",
            'no_hp'             =>"required|string",
            'asuransi'          =>"required|string|in:-,JAMKESMAS,JAMKESMAN,JAMKESDA,BPJS,JAMKESTA,
                                    Kelurga Sejahtera (KKS),
                                    Program Keluarga Harapan (PKH)",
            // 'alamat_sekarang'
            // 'alamat_asal'
            // 'alamat_minatbakat'

        ],$CustomMessages);


        $user=auth::user();

        $user->email           = $ini["email"];
        $user->save();

        $mahasiswa=$user->mahasiswa;
        $mahasiswa->nama            = $ini["nama"] ;
        $mahasiswa->nim             = $ini["nim"] ;
        $mahasiswa->tgl_lahir       = $ini["tgl_lahir"] ;
        $mahasiswa->tempat_lahir    = $ini["tempat_lahir"] ;
        $mahasiswa->jenis_kelamin   = $ini["jenis_kelamin"] ;
        $mahasiswa->golongan_darah  = $ini["golongan_darah"] ;
        $mahasiswa->agama           = $ini["agama"] ;
        $mahasiswa->status_menikah  = $ini["status_menikah"] ;
        $mahasiswa->no_ktp          = $ini["no_ktp"] ;
        $mahasiswa->no_hp           = $ini["no_hp"] ;
        $mahasiswa->asuransi        = $ini["asuransi"] ;
        $mahasiswa->save();

        Alert::success('biodata berhasil diupdate!','success');

        return redirect()->back();
    }
}
