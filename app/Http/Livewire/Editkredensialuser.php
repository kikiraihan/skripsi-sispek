<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use Hash;
use Validator;

class Editkredensialuser extends Component
{
    public $metode;
    public $formTitle;

    public $passwordLama;
    public $passwordBaru;

    public $username;
    public $nama;
    public $email;

    protected $listeners=[
        'bukaGantiPassword'=>'inputGantiPassword',
        'bukaEditProfil'=>'inputEditProfil',
    ];

    // public function mount($usernama)
    // {
    //     $this->usernama=$usernama;
    // }

    public function render()
    {
        return view('livewire.editkredensialuser');
    }

    public function inputGantiPassword()
    {
        $this->reset();
        $this->metode="gantiPassword";
        $this->formTitle="Ganti Password";
    }

    public function inputEditProfil()
    {
        $this->reset();
        $this->metode="editProfil";
        $this->formTitle="Edit Profil";

        $user=auth::user();
        $this->username =$user->username;
        $this->nama     =$user->KredensialUserNama;
        $this->email    =$user->email;

    }


    public function gantiPassword()
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

        $user=auth::user();

        //validasi
        $CustomMessages = [
            // 'integer' => 'Kolom :attribute, harus berupa angka',
            'string' => 'Kolom :attribute, harus berupa angka',
            'required'=>'Kolom :attribute tidak boleh kosong',
            'unique'=>'Data kolom :attribute sudah ada sebelumnya',
        ];

        $ini=$this->validate( [
            'passwordLama'             =>"required|string|checkHashedPass:" . $this->passwordLama,
            'passwordBaru'              =>"required|string|min:8",
        ],$CustomMessages);

        auth::user()->password = $this->passwordBaru;
        auth::user()->save();


        $this->reset();
        // $this->inputTambah();
        $this->emit('swalUpdated');
    }


    public function editProfil()
    {

        $user=auth::user();

        //validasi
        $CustomMessages = [
            // 'integer' => 'Kolom :attribute, harus berupa angka',
            'string' => 'Kolom :attribute, harus berupa angka',
            'required'=>'Kolom :attribute tidak boleh kosong',
            'unique'=>'Data kolom :attribute sudah ada sebelumnya',
        ];

        $ini=$this->validate( [
            'username'             =>"required|string",
            'nama'                 =>"required|string",
            'email'                =>"required|email",
        ],$CustomMessages);

        // dd($user->dosen->nama);

        $user->username = $this->username;
        $user->email    = $this->email;
        if (AUTH::user()->hasRole('Dosen'))
        $user->dosen->nama    = $this->nama;

        $user->save();
        if (AUTH::user()->hasRole('Dosen'))
        $user->dosen()->save($user->dosen);

        $this->reset();
        // $this->inputTambah();
        $this->emit('swalUpdated');

    }


}
