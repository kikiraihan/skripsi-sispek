<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDosenController extends Controller
{

    public function index()
    {
        $komponen="masterAdminDosen";
        return view('page.Datamahasiswa.main', compact(['komponen']));
    }




}
