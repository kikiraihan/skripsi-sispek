<?php

namespace App\Http\Controllers\Datamahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class PrestasiController extends Controller
{
    public function my()
    {
        $komponen="myprestasi";
        return view('page.Datamahasiswa.main', compact(['komponen']));
    }


}
