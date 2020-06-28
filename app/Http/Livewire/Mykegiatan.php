<?php

namespace App\Http\Livewire;

use Livewire\Component;
use auth;
use App\Models\Kegiatan;

class Mykegiatan extends Component
{
    public $kegiatan;

    protected $listeners=[
        'kegiatanDitambahkan'=>'efekDitambahkan',
        'kegiatanDiupdate'=>'mount'
    ];

    public function mount()
    {
        $this->kegiatan=auth::user()->mahasiswa->kegiatan;
    }

    public function render()
    {
        return view('livewire.mykegiatan');
    }


    //LISTENERS
    public function efekDitambahkan($newKegiatan)
    {
        // $this->mount();
        $newKegiatan=Kegiatan::find($newKegiatan['id']);
        $this->kegiatan->push($newKegiatan);

    }


    //CUSTOM METHOD
    public function delete($id)
    {
        $toDelete=Kegiatan::find($id);
        $toDelete->delete();
        $this->mount();
    }

    public function bukaTambah()
    {
        $this->emit('bukaTambah');
    }

    public function bukaUpdate($id)
    {
        $this->emit('bukaUpdate',$id);
    }



}
