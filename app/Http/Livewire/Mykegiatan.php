<?php

namespace App\Http\Livewire;

use Livewire\Component;
use auth;
use App\Models\Kegiatan;

class Mykegiatan extends Component
{
    public $kegiatan;

    protected $listeners=[
        'kegiatanDitambahkan'=>'efekDitambahkan'
    ];

    public function mount()
    {
        $this->kegiatan=auth::user()->mahasiswa->kegiatan;
    }

    public function render()
    {
        return view('livewire.mykegiatan');
    }


    public function efekDitambahkan($newKegiatan)
    {
        // $this->mount();
        $newKegiatan=Kegiatan::find($newKegiatan['id']);
        $this->kegiatan->push($newKegiatan);

    }



}
