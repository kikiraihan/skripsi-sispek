<?php

namespace App\Http\Controllers\Datamahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use auth;

class OrangtuaController extends Controller
{
    public function my()
    {
        $user=auth::user();
        return view('page.Datamahasiswa.myorangtua', compact(['user']));
    }
}
