<?php

namespace App\Http\Livewire;

use Livewire\Component;
use auth;
use Carbon\Carbon;
use App\Models\Ormawa;

class Myormawainput extends Component
{

    public $metode;
    public $formTitle;

    protected $listeners=[
        'bukaTambahOrmawa'=>'inputTambah',
        'bukaUpdateOrmawa'=>'inputUpdate',
    ];

    public $idToUpdate;

    // public $id_mahasiswa;
    public $id_ormawa;
    public $periode_dari;
    public $periode_sampai;//null
    public $suratbuktianggota;//null
    public $status;//valid


    // public function updated($field)
    // {
    //     $this->validateOnly($field, [
    //         'judul'         =>"required",
    //         'tanggal'       =>"required|date",
    //     ]);
    // }

    public function mount()
    {
        $this->periode_dari='';
        $this->periode_sampai='';
        $this->id_ormawa='';
    }


    public function render()
    {
        $ormawa=Ormawa::all();
        $yearRange=range(Carbon::now()->year+10,Carbon::now()->year-10);//10 tahun kebawah dan keatas
        return view('livewire.myormawainput',compact(['yearRange','ormawa']));
    }


    public function inputTambah()
    {
        $this->reset();
        $this->metode="newOrmawa";
        $this->formTitle="Ormawa Baru Saya";
    }

    public function inputUpdate($id)
    {
        $this->reset();
        $ormawa=auth::user()->mahasiswa->organisasi->where('id',$id)->first();
        $this->idToUpdate           =$id;

        // $this->id_mahasiswa         =$ormawa->id_mahasiswa;
        // $this->status               =$ormawa->status;//valid
        $this->id_ormawa            =$id;//$ormawa->pivot->id_ormawa//$ormawa->id
        $this->periode_dari         =$ormawa->pivot->periode_dari;
        $this->periode_sampai       =$ormawa->pivot->periode_sampai;//null
        $this->suratbuktianggota    =$ormawa->pivot->suratbuktianggota;//null

        $this->metode="updateOrmawa";
        $this->formTitle="Update Keanggotaan";
    }


    public function newOrmawa()
    {
        $mahasiswa=auth::user()->mahasiswa;

        //validasi
        $CustomMessages = [
            // 'integer' => 'Kolom :attribute, harus berupa angka',
            'string' => 'Kolom :attribute, harus berupa angka',
            'date' => 'Kolom :attribute, harus berupa tanggal',
            'required'=>'Kolom :attribute tidak boleh kosong',
            'unique'=>'Data kolom :attribute sudah ada sebelumnya',
        ];

        $ini=$this->validate( [
            'id_ormawa'         =>"required|unique:anggota_ormawa,id_ormawa,NULL,id,id_mahasiswa,". $mahasiswa->id,
            'periode_dari'       =>"required|date_format:Y",
            'periode_sampai'        =>"required|date_format:Y",
            // 'suratbuktianggota' =>"required|string",
        ],$CustomMessages);

        // // kalau buat ormawa baru
        // $ormawa=new Ormawa;
        // $ormawa->nama='Kelompok Studi Linux - UNG';
        // $ormawa->binaan='Fakultas Teknik';
        // $ormawa->deskripsi="Kelompok Studi Linux Universitas Negeri Gorontalo adalah komunitas  tempat berkumpulnya warga Universitas Negeri Gorontalo yang tertarik untuk mendalami sistem operasi Linux lebih jauh. KSL UNG ini menerima anggota baik dari yang  mau belajar sampai yang mahir menggunakan linux. sow, jangan malu-malu buat yang belum mengerti sama seklai.. justru di sinilah kita akan belajar. ksl ung ini dibimbing oleh seorang dosen yang kebetulan mantan dari ksl UGM, Kelompok ini tidak meminta pungutan sekecil apapun. ayo buruan gabung!!!!";
        // $ormawa->website="https://carelaig.com/kelompok-studi-linux-ksl-ung/";
        // $ormawa->jenis="UKM";//'himpunan','UKM','paguyuban','luar_kampus',
        // $ormawa->kategori="Teknologi";
        // $ormawa->save();

        //pilih ormawa
        $mahasiswa->organisasi()->attach($this->id_ormawa, [
            'periode_dari'      => $this->periode_dari,
            'periode_sampai'    => $this->periode_sampai,
            'suratbuktianggota' => 'ada',//$this->suratbuktianggota
            'status'            => "valid"
        ]);


        $this->reset();
        $this->inputTambah();
        $this->emit('ormawaDitambahkan',$mahasiswa->organisasi());
    }



    public function updateOrmawa()
    {
        $mahasiswa=auth::user()->mahasiswa;
        $idToUpdate=$this->idToUpdate;

        $mahasiswa->organisasi()->updateExistingPivot($idToUpdate, [
            'periode_dari'      => $this->periode_dari,
            'periode_sampai'    => $this->periode_sampai,
            'suratbuktianggota' => 'ada',//$this->suratbuktianggota
            'status'            => "valid"
        ]);


        $this->reset();
        $this->inputUpdate($idToUpdate);
        $this->emit('ormawaDiupdate');

    }




}
