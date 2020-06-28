<?php

namespace App\Http\Livewire;

use Livewire\Component;
use auth;
use App\Models\Saudara;

class Mysaudarainput extends Component
{

    public $metode;
    public $formTitle;

    protected $listeners=[
        'bukaTambahSaudara'=>'inputTambah',
        'bukaUpdateSaudara'=>'inputUpdate',
    ];

    public $idToUpdate;

    // public $id_mahasiswa;
    public $nama;
    public $pendidikan_terakhir;
    public $bekerja;
    public $hubungan;



    public function mount()
    {

    }



    public function render()
    {
        return view('livewire.mysaudarainput');
    }


    public function inputTambah()
    {
        $this->reset();
        $this->metode="newSaudara";
        $this->formTitle="Data Baru";
    }

    public function inputUpdate($id)
    {
        $this->reset();
        $saudara=auth::user()->mahasiswa->saudara->where('id',$id)->first();

        $this->idToUpdate       =$id;

        $this->nama                  = $saudara->nama;
        $this->pekerjaan             = $saudara->pekerjaan;
        $this->kategori_pekerjaan    = $saudara->kategori_pekerjaan;
        $this->no_hp                 = $saudara->no_hp;
        $this->pendidikan_terakhir   = $saudara->pendidikan_terakhir;
        $this->kategori_penghasilan  = $saudara->kategori_penghasilan;
        $this->nominal_penghasilan   = $saudara->nominal_penghasilan;
        $this->hubungan              = $saudara->hubungan;

        $this->metode="updateSaudara";
        $this->formTitle="Update Orangtua";
    }




    public function newSaudara()
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
            'nama'                   =>"required|string",
            'pendidikan_terakhir'    =>"required|string|in:tidak sekolah,SD,SMP,SMA,S1,S2,S3",
            'bekerja'                =>"required|string|in:1.0",
            'hubungan'               =>"required|string|in:kakak,adik",
        ],$CustomMessages);

        $saudara=new Saudara;
        $saudara->id_mahasiswa         = $mahasiswa->id;
        $saudara->nama                 = $this->nama;
        $saudara->pendidikan_terakhir  = $this->pendidikan_terakhir;
        $saudara->bekerja              = $this->bekerja;
        $saudara->hubungan             = $this->hubungan;
        $saudara->save();


        $this->reset();
        $this->inputTambah();
        $this->emit('saudaraDitambahkan',$saudara);
    }





    public function updateSaudara()
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
            'nama'                   =>"required|string",
            'pendidikan_terakhir'    =>"required|string|in:tidak sekolah,SD,SMP,SMA,S1,S2,S3",
            'bekerja'                =>"required|string|in:1.0",
            'hubungan'               =>"required|string|in:kakak,adik",
        ],$CustomMessages);


        $saudara=
        auth::user()->mahasiswa->saudara->where('id',$this->idToUpdate)->first();


        // $saudara->id_mahasiswa         = auth::user()->mahasiswa->id;
        $saudara->nama                 = $this->nama;
        $saudara->pendidikan_terakhir  = $this->pendidikan_terakhir;
        $saudara->bekerja              = $this->bekerja;
        $saudara->hubungan             = $this->hubungan;

        $saudara->save();
        $this->reset();
        $this->inputUpdate($saudara->id);
        $this->emit('saudaraDiupdate');

    }


}
