<?php

namespace App\Http\Controllers\Datamahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use auth;

class OrmawaController extends Controller
{
    public function my()
    {
        $komponen="myormawa";
        return view('page.Datamahasiswa.main', compact(['komponen']));
    }
}
