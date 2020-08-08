<?php

namespace App\Http\Livewire;

use Livewire\Component;
use auth;
use App\Models\Saudara;

class Mysaudara extends Component
{

    public $saudara;

    protected $listeners=[
        'saudaraDitambahkan'=>'efekDitambahkan',
        'saudaraDiupdate'=>'mount',
        'saudaraFixHapus'=>'delete'
    ];

    public function mount()
    {
        $this->saudara=auth::user()->mahasiswa->saudara;
    }


    public function render()
    {
        return view('livewire.mysaudara');
    }


    //LISTENERS
    public function efekDitambahkan($newSaudara)
    {
        // $this->mount();
        $newSaudara=Saudara::find($newSaudara['id']);
        $this->saudara->push($newSaudara);

    }


    //CUSTOM METHOD
    public function delete($id)
    {
        $toDelete=Saudara::find($id);
        $toDelete->delete();
        $this->mount();
    }

    public function bukaTambah()
    {
        $this->emit('bukaTambahSaudara');
    }

    public function bukaUpdate($id)
    {
        $this->emit('bukaUpdateSaudara',$id);
    }


}
