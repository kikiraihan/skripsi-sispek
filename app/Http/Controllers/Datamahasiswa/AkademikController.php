<?php

namespace App\Http\Controllers\Datamahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use auth;

class AkademikController extends Controller
{
    public function myTranskrip()
    {
        return $this->tranksripShow(auth::user()->mahasiswa->id);
    }

    public function tranksripShow($id)
    {
        $ipk=null;
        $tgl=null;

        $mahasiswa=Mahasiswa::find($id);
        foreach($mahasiswa->ipksebelumnya as $ipkseb)
        {
            $ipk[]=$ipkseb->ipk;
            $tgl[]=$ipkseb->created_at->formatLocalized("%B-%Y");
        }

        $ipk_chart=json_encode($ipk);
        $tgl_chart=json_encode($tgl);

        return view('page.transkrip-show', compact(['mahasiswa','tgl_chart','ipk_chart']));
    }
}
