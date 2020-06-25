<?php

namespace App\Http\Controllers\Datamahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class PrestasiController extends Controller
{
    public function my()
    {
        $user=auth::user();
        return view('page.Datamahasiswa.myprestasi', compact(['user']));
    }
}
