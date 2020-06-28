<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use Auth;
use Hash;
use Validator;
// use RealRashid\SweetAlert\Facades\Alert;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // alert()->warning('sukses','berhasil teleh memperloginkannya bela, login!');

        if(auth::user()->hasRole('Mahasiswa'))
        {
            $user=auth::user();
            return view('page.profile', compact(['user']));
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
