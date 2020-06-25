<?php

namespace App\Http\Livewire;

use Livewire\Component;
use auth;
use App\Models\Kegiatan;

class Mykegiataninput extends Component
{

    // public $id_mahasiswa;
    // public $status;
    public $judul;
    public $tanggal;
    public $lokasi;
    public $penyelenggara;
    public $sertifikat;

    public function newKegiatan()
    {
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
        $this->emit('kegiatanDitambahkan',$kegiatan);
    }

    public function render()
    {
        return view('livewire.mykegiataninput');
    }
}
