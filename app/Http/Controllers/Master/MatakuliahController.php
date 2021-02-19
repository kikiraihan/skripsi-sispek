<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    
    public function __invoke(Request $request)
    {
        $komponen="masterMatakuliah";
        return view('page.Datamahasiswa.main', compact(['komponen']));
    }
}
