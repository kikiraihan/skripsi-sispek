<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use Auth;
use Hash;
use Validator;
use App\Models\Mahasiswa;
// use RealRashid\SweetAlert\Facades\Alert;



class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // alert()->warning('sukses','berhasil teleh memperloginkannya bela, login!');

        if(auth::user()->hasRole('Mahasiswa'))
        {
            $user=auth::user();
            return view('page.profile', compact(['user']));
        }
        elseif(auth::user()->hasRole('Dosen'))
        {
            $user=auth::user();


            $mahasiswa=$user->dosen->mahasiswapa;
            $mahasiswa_menurun_ipk=[];
            $mahasiswa_ipkbaik=[];
            $mahasiswa_ipkkurang=[];
            foreach($mahasiswa as $m){
                if($m->ipksekarang < $m->ipksebelumnyaberubah and  0.25 < ($m->ipksebelumnyaberubah-$m->ipksekarang))
                $mahasiswa_menurun_ipk[]=$m;
                if($m->ipksekarang>='3')
                $mahasiswa_ipkbaik[]=$m;
                if($m->ipksekarang<2.5)
                $mahasiswa_ipkkurang[]=$m;
            }
            $mahasiswa_menurun_ipk  =collect($mahasiswa_menurun_ipk);
            $mahasiswa_ipkbaik      =collect($mahasiswa_ipkbaik);
            $mahasiswa_ipkkurang    =collect($mahasiswa_ipkkurang);

            $mahasiswa_nilai_e=$user->dosen->mahasiswapa()->whereHas('matakuliahnilaie')->get();

            return view('page.Dashboard.dashboard-dosen', compact(['user','mahasiswa_menurun_ipk','mahasiswa_nilai_e','mahasiswa_ipkbaik','mahasiswa_ipkkurang']));
        }

    }

    public function passwordUpdate(Request $request)
    {
        //validasi tambahan
        Validator::extend('checkHashedPass', function($attribute, $value, $parameters)
        {
            if( ! Hash::check( $value , auth::user()->password ) )
            {
                return false;
            }
            return true;
        });


        //validasi
        $CustomMessages = [
            'integer' => 'Kolom :attribute, harus berupa angka',
            'string' => 'Kolom :attribute, harus berupa angka',
            'min' => 'Kolom :attribute, harus min 8 huruf',
            'check_hashed_pass' => 'Password lama salah!',
        ];

        $ini=$request->validate( [
            'password_lama'             =>"required|string|min:8|checkHashedPass:" . $request->password_lama,
            'password_baru'              =>"required|string|min:8",
        ],$CustomMessages);


        auth::user()->password = Hash::make($ini['password_baru']);
        auth::user()->save();

        Alert::success('password berhasil diupdate!','success');

        return redirect()->back();

    }
}
