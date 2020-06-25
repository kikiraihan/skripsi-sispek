<?php

namespace App\Http\Controllers\Datamahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class KegiatanController extends Controller
{

    public function my()
    {
        $komponen="mykegiatan";
        return view('page.Datamahasiswa.main', compact(['komponen']));

    }



}
