<?php

namespace App\Http\Controllers\Datamahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use auth;

class BiodataController extends Controller
{
    public function edit()
    {
        $user=auth::user();
        return view('page.Datamahasiswa.editBio', compact(['user']));
    }
}
