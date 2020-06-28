<?php

namespace App\Http\Livewire;

use Livewire\Component;
use auth;
use App\Models\Prestasi;

class Myprestasiinput extends Component
{
    public $metode;
    public $formTitle;

    protected $listeners=[
        'bukaTambahPrestasi'=>'inputTambah',
        'bukaUpdatePrestasi'=>'inputUpdate',
    ];

    public $idToUpdate;

    // public $id_mahasiswa;
    // public $status;//valid
    // public $sertifikat;

    public $judul;
    public $tanggal;
    public $tingkat;
    public $peringkat;
    public $lokasi;
    public $kategori;

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.myprestasiinput');
    }

    public function inputTambah()
    {
        $this->reset();
        $this->metode="newPrestasi";
        $this->formTitle="Prestasi Baru Saya";
    }

    public function inputUpdate($id)
    {
        $this->reset();
        $prestasi=auth::user()->mahasiswa->prestasi->where('id',$id)->first();

        $this->idToUpdate       =$id;

        // $this->id_mahasiswa     =$prestasi->id_mahasiswa;
        $this->judul        = $prestasi->judul;
        $this->tanggal      = $prestasi->tanggal->formatLocalized("%Y-%m-%d");
        $this->tingkat      = $prestasi->tingkat;
        $this->peringkat    = $prestasi->peringkat;
        $this->lokasi       = $prestasi->lokasi;
        $this->kategori     = $prestasi->kategori;

        $this->metode="updatePrestasi";
        $this->formTitle="Update Prestasi";
    }

    public function newPrestasi()
    {
        $mahasiswa=auth::user()->mahasiswa;

        //validasi
        $CustomMessages = [
            'integer' => 'Kolom :attribute, harus berupa angka',
            'string' => 'Kolom :attribute, harus berupa angka',
            'date' => 'Kolom :attribute, harus berupa tanggal',
            'required'=>'Kolom :attribute tidak boleh kosong',
            'unique'=>'Data kolom :attribute sudah ada sebelumnya',
        ];

        $ini=$this->validate( [
            'judul'         =>"required|string",
            'tanggal'       =>"required|date",
            'tingkat'       =>"required|string",
            'peringkat'     =>"required|integer",
            'lokasi'        =>"required|string",
            'kategori'      =>"required|string"
        ],$CustomMessages);

        $prestasi=new Prestasi;
        $prestasi->id_mahasiswa =auth::user()->mahasiswa->id;
        $prestasi->sertifikat   ='ada';
        $prestasi->status       ='valid';
        $prestasi->judul        =$this->judul;
        $prestasi->tanggal      =$this->tanggal;
        $prestasi->tingkat      =$this->tingkat;
        $prestasi->peringkat    =$this->peringkat;
        $prestasi->lokasi       =$this->lokasi;
        $prestasi->kategori     =$this->kategori;
        $prestasi->save();


        $this->reset();
        $this->inputTambah();
        $this->emit('prestasiDitambahkan',$prestasi);
    }


    public function updatePrestasi()
    {

        //validasi
        $CustomMessages = [
            'integer' => 'Kolom :attribute, harus berupa angka',
            'string' => 'Kolom :attribute, harus berupa angka',
            'date' => 'Kolom :attribute, harus berupa tanggal',
            'required'=>'Kolom :attribute tidak boleh kosong',
            'unique'=>'Data kolom :attribute sudah ada sebelumnya',
        ];

        $ini=$this->validate( [
            'judul'         =>"required|string",
            'tanggal'       =>"required|date",
            'tingkat'       =>"required|string",
            'peringkat'     =>"required|integer",
            'lokasi'        =>"required|string",
            'kategori'      =>"required|string"
        ],$CustomMessages);



        $prestasi=
        auth::user()->mahasiswa->prestasi->where('id',$this->idToUpdate)->first();

        // $prestasi->id_mahasiswa     =$this->id_mahasiswa;
        // $prestasi->status           =$this->status;
        $prestasi->judul        =$this->judul;
        $prestasi->tanggal      =$this->tanggal;
        $prestasi->tingkat      =$this->tingkat;
        $prestasi->peringkat    =$this->peringkat;
        $prestasi->lokasi       =$this->lokasi;
        $prestasi->kategori     =$this->kategori;

        $prestasi->save();
        $this->reset();
        $this->inputUpdate($prestasi->id);
        $this->emit('prestasiDiupdate');

    }

}
