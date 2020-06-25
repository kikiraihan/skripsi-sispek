<?php

namespace App\Http\Controllers\Datamahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use auth;

class SaudaraController extends Controller
{
    public function my()
    {
        $user=auth::user();
        return view('page.Datamahasiswa.mysaudara', compact(['user']));
    }
}
