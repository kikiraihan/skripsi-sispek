<?php

namespace App\Http\Controllers\Datamahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use auth;

class OrangtuaController extends Controller
{
    public function my()
    {
        $komponen="myorangtua";
        return view('page.Datamahasiswa.main', compact(['komponen']));
    }
}
