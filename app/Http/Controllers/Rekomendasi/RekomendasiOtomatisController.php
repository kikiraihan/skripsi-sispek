<?php

namespace App\Http\Controllers\Rekomendasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RekomendasiOtomatisController extends Controller
{

    public function index()
    {
        $komponen="rekomendasiotomatis.index";
        return view('page.Rekomendasi.master',compact(['komponen']));
    }











    public function tdatahufungsiapa()
    {




        // EMBEDDED SKRIP / parser

        //##tahap pengambilan data  : FUNGSI ($modelDariDb, $id_mahasiswa)
        // cara instansiasi model dari db
        $kolomModelKriteriaMaster="App\Models\Mahasiswa";
        $model= $kolomModelKriteriaMaster::find(1);

        // return $model
        $mahasiswa=auth::user()->mahasiswa;
        $model=$mahasiswa;




        //AWAL FUNGSI

        //##tahap penelusuran path  : FUNGSI (MODEL, pathTo)
        $next = $model;
        $jenis_kriteria='non angka';
        $rasio=[
            '< Rp. 1 juta'=>1,
            'Rp. 1 juta - 3 juta'=>2,
            'Rp. 3 juta - 5 juta'=>3,
            'Rp. 5 juta - 10 juta'=>4,
            '> Rp. 10 juta'=>5,
        ];



        // pathTo dari db
        $pathTo=json_decode($pathTo);
        //solusi stdCLass dari json adalah, setiap ada array asosiatif pemanggilan mengunakan objek


        foreach($pathTo as $path=>$isi)
        {

            $jenis=explode("0",$path)[1];
            $pth=explode("0",$path)[0];


            if($jenis==1)
            {
                //kolom/tabel
                $next=$next->$pth;

            }
            elseif($jenis==2)
            {
                // kolom with kondisi, kolom tpi fungsi (matakuliah())
                $next=$next->$pth();
            }
            elseif($jenis==3)
            {
                $next=$next->$pth();
                // fungsi 0 parameter (get(),first(),count())
            }
            elseif($jenis==31)
            {
                // fungsi 1 parameter
                if($pth=="sum")
                    $next=$next->$pth($isi->column);
                                // sum(column)
            }
            elseif($jenis==32)
            {
                // fungsi 2 parameter
                if($pth=="where")
                    $next=$next->$pth($isi->column,$isi->value);// where(column,value),
                elseif($pth=="orderBy")
                    $next=$next->$pth($isi->column,$isi->arah);// orderBy('column', 'arah')

                //elseif("wherein") dst...
                // else dd('notfound'); //tdk masalah ba notfound.. kan cuma ba query bukan b simpan
            }
            elseif($jenis==33)
            {
                // fungsi 3 parameter
                if($pth=="where")
                    $next=$next->$pth($isi->column,$isi->operator,$isi->value);//( where(kolom,==,value),  )

                //elseif("wherein") dst...
                // else dd('notfound');
            }
            elseif($jenis==4)
            {
                // path04 ----> pivot
                $next=$next->$pth;
            }

        }


        //jika jenis kriteria non angka convert dlu
        if($jenis_kriteria=='non angka'){
            $next=$rasio[$next];
        }

        dd($next);



    }





















}
