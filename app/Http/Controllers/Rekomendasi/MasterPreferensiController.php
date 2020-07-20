<?php

namespace App\Http\Controllers\Rekomendasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterPreferensiController extends Controller
{
    public function index()
    {

        // return view('page.Datamahasiswa.main', compact(['komponen']));

        $komponen="masterpreferensi.index";
        return view('page.Rekomendasi.master',compact(['komponen']));
    }

    public function tambah()
    {

        $komponen="masterpreferensi.input";
        return view('page.Rekomendasi.master',compact(['komponen']));
    }
}
