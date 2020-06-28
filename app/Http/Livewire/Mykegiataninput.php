<?php

namespace App\Http\Livewire;

use Livewire\Component;
use auth;
use App\Models\Kegiatan;

class Mykegiataninput extends Component
{

    public $metode;
    public $formTitle;

    protected $listeners=[
        'bukaTambah'=>'inputTambah',
        'bukaUpdate'=>'inputUpdate',
    ];


    public $idToUpdate;

    // public $id_mahasiswa;
    public $status;
    public $judul;
    public $tanggal;
    public $lokasi;
    public $penyelenggara;
    public $sertifikat;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'judul'         =>"required",
            'tanggal'       =>"required|date",
        ]);
    }

    public function render()
    {
        return view('livewire.mykegiataninput');
    }



    public function inputTambah()
    {
        $this->reset();
        $this->metode="newKegiatan";
        $this->formTitle="Kegiatan Baru";
    }

    public function inputUpdate($id)
    {
        $this->reset();
        $kegiatan=auth::user()->mahasiswa->kegiatan->where('id',$id)->first();

        // dd($kegiatan->tanggal);
        $this->idToUpdate       =$id;

        // $this->id_mahasiswa     =$kegiatan->id_mahasiswa;
        $this->status           =$kegiatan->status;
        $this->judul            =$kegiatan->judul;
        $this->tanggal          =$kegiatan->tanggal->formatLocalized("%Y-%m-%d");
        $this->lokasi           =$kegiatan->lokasi;
        $this->penyelenggara    =$kegiatan->penyelenggara;
        $this->sertifikat       =$kegiatan->sertifikat;

        $this->metode="updateKegiatan";
        $this->formTitle="Update Kegiatan";
    }





    public function newKegiatan()
    {
        //validasi
        $CustomMessages = [
            // 'integer' => 'Kolom :attribute, harus berupa angka',
            'string' => 'Kolom :attribute, harus berupa angka',
            'date' => 'Kolom :attribute, harus berupa tanggal',
            'required'=>'Kolom :attribute tidak boleh kosong',
        ];

        $this->validate( [
            'judul'         =>"required",
            'tanggal'       =>"required|date",
            'lokasi'        =>"required|string",
            'penyelenggara' =>"required|string",
            'sertifikat'    =>"nullable",
            // 'status'        =>"required",
        ],$CustomMessages);

        $kegiatan=new Kegiatan;
        $kegiatan->id_mahasiswa=auth::user()->mahasiswa->id;
        $kegiatan->judul=$this->judul;
        $kegiatan->tanggal=$this->tanggal;
        $kegiatan->lokasi=$this->lokasi;
        $kegiatan->penyelenggara=$this->penyelenggara;
        $kegiatan->sertifikat='ada';
        $kegiatan->status='valid';
        $kegiatan->save();
        $this->reset();
        $this->inputTambah();
        $this->emit('kegiatanDitambahkan',$kegiatan);
    }

    public function updateKegiatan()
    {
        $kegiatan=
        auth::user()->mahasiswa->kegiatan->where('id',$this->idToUpdate)->first();

        // $kegiatan->id_mahasiswa     =$this->id_mahasiswa;
        $kegiatan->status           =$this->status;
        $kegiatan->judul            =$this->judul;
        $kegiatan->tanggal          =$this->tanggal;
        $kegiatan->lokasi           =$this->lokasi;
        $kegiatan->penyelenggara    =$this->penyelenggara;
        $kegiatan->sertifikat       =$this->sertifikat;

        $kegiatan->save();
        $this->reset();
        $this->inputUpdate($kegiatan->id);
        $this->emit('kegiatanDiupdate');

    }
}
