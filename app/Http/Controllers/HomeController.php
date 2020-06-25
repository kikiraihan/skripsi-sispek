<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use Auth;
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
}
