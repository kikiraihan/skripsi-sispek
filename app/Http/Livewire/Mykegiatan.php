<?php

namespace App\Http\Livewire;

use Livewire\Component;
use auth;
use App\Models\Kegiatan;
use Livewire\WithPagination;

class Mykegiatan extends Component
{


    use WithPagination;


    // public $kegiatan;

    protected $listeners=[
        'kegiatanDitambahkan'=>'efekDitambahkan',
        'kegiatanDiupdate'=>'mount',
        'kegiatanFixHapus'=>'delete'
    ];

    public function mount()
    {
        // $this->kegiatan=;
    }

    public function render()
    {
        return view('livewire.mykegiatan',[
            'kegiatan' => auth::user()->mahasiswa->kegiatan()->paginate(10),
        ]);
    }


    //LISTENERS
    public function efekDitambahkan($newKegiatan)
    {
        $this->mount();
        // $newKegiatan=Kegiatan::find($newKegiatan['id']);
        // $this->kegiatan->push($newKegiatan);

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
