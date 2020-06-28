<?php

namespace App\Http\Livewire;

use Livewire\Component;
use auth;
use App\Models\Orangtua;

class Myorangtuainput extends Component
{

    public $metode;
    public $formTitle;

    protected $listeners=[
        'bukaTambahOrangtua'=>'inputTambah',
        'bukaUpdateOrangtua'=>'inputUpdate',
    ];

    public $idToUpdate;

    // public $id_mahasiswa;
    public $nama;
    public $pekerjaan;
    public $kategori_pekerjaan;
    public $no_hp;
    public $pendidikan_terakhir;
    public $kategori_penghasilan;
    public $nominal_penghasilan;
    public $hubungan;



    public function mount()
    {

    }



    public function render()
    {
        return view('livewire.myorangtuainput');
    }



    public function inputTambah()
    {
        $this->reset();
        $this->metode="newOrangtua";
        $this->formTitle="Data Baru";
    }

    public function inputUpdate($id)
    {
        $this->reset();
        $orangtua=auth::user()->mahasiswa->orangtua->where('id',$id)->first();

        $this->idToUpdate       =$id;

        $this->nama                  = $orangtua->nama;
        $this->pekerjaan             = $orangtua->pekerjaan;
        $this->kategori_pekerjaan    = $orangtua->kategori_pekerjaan;
        $this->no_hp                 = $orangtua->no_hp;
        $this->pendidikan_terakhir   = $orangtua->pendidikan_terakhir;
        $this->kategori_penghasilan  = $orangtua->kategori_penghasilan;
        $this->nominal_penghasilan   = $orangtua->nominal_penghasilan;
        $this->hubungan              = $orangtua->hubungan;

        $this->metode="updateOrangtua";
        $this->formTitle="Update Orangtua";
    }


    public function newOrangtua()
    {
        $mahasiswa=auth::user()->mahasiswa;

        //validasi
        $CustomMessages = [
            'integer' => 'Kolom :attribute, harus berupa angka',
            'string' => 'Kolom :attribute, harus berupa angka',
            'date' => 'Kolom :attribute, harus berupa tanggal',
            'required'=>'Kolom :attribute tidak boleh kosong',
            'unique'=>'Data kolom :attribute sudah ada sebelumnya'
        ];

        $ini=$this->validate( [
            'nama'                  =>"required|string",
            'pekerjaan'             =>"required|string",
            'kategori_pekerjaan'    =>"required|string",
            'no_hp'                 =>"required|string",
            'pendidikan_terakhir'   =>"required|string",
            'kategori_penghasilan'  =>"required|string",
            'nominal_penghasilan'   =>"required|integer",
            'hubungan'              =>"required|string"
        ],$CustomMessages);

        $orangtua=new Orangtua;
        $orangtua->id_mahasiswa         = $mahasiswa->id;
        $orangtua->nama                 = $this->nama;
        $orangtua->pekerjaan            = $this->pekerjaan;
        $orangtua->kategori_pekerjaan   = $this->kategori_pekerjaan;
        $orangtua->no_hp                = $this->no_hp;
        $orangtua->pendidikan_terakhir  = $this->pendidikan_terakhir;
        $orangtua->kategori_penghasilan = $this->kategori_penghasilan;
        $orangtua->nominal_penghasilan  = $this->nominal_penghasilan;
        $orangtua->hubungan             = $this->hubungan;
        $orangtua->save();


        $this->reset();
        $this->inputTambah();
        $this->emit('orangtuaDitambahkan',$orangtua);
    }


    public function updateOrangtua()
    {
        //validasi
        $CustomMessages = [
            'integer' => 'Kolom :attribute, harus berupa angka',
            'string' => 'Kolom :attribute, harus berupa angka',
            'date' => 'Kolom :attribute, harus berupa tanggal',
            'required'=>'Kolom :attribute tidak boleh kosong',
            'unique'=>'Data kolom :attribute sudah ada sebelumnya'
        ];

        $ini=$this->validate( [
            'nama'                  =>"required|string",
            'pekerjaan'             =>"required|string",
            'kategori_pekerjaan'    =>"required|string",
            'no_hp'                 =>"required|string",
            'pendidikan_terakhir'   =>"required|string",
            'kategori_penghasilan'  =>"required|string",
            'nominal_penghasilan'   =>"required|integer",
            'hubungan'              =>"required|string"
        ],$CustomMessages);


        $orangtua=
        auth::user()->mahasiswa->orangtua->where('id',$this->idToUpdate)->first();


        // $orangtua->id_mahasiswa         = auth::user()->mahasiswa->id;
        $orangtua->nama                 = $this->nama;
        $orangtua->pekerjaan            = $this->pekerjaan;
        $orangtua->kategori_pekerjaan   = $this->kategori_pekerjaan;
        $orangtua->no_hp                = $this->no_hp;
        $orangtua->pendidikan_terakhir  = $this->pendidikan_terakhir;
        $orangtua->kategori_penghasilan = $this->kategori_penghasilan;
        $orangtua->nominal_penghasilan  = $this->nominal_penghasilan;
        $orangtua->hubungan             = $this->hubungan;

        $orangtua->save();
        $this->reset();
        $this->inputUpdate($orangtua->id);
        $this->emit('orangtuaDiupdate');

    }


}
