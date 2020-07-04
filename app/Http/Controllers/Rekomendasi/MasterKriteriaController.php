<?php

namespace App\Http\Controllers\Rekomendasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masterkriteria;

class MasterKriteriaController extends Controller
{

    public function index()
    {
        //cara mengakses path
        // $cek=Masterkriteria::find(26);
        // dd($cek->PathToRenderModel(1));

        $komponen="masterkriteria";
        return view('page.Datamahasiswa.main', compact(['komponen']));
    }


}
