<?php

namespace App\Http\Livewire;

use Livewire\Component;
use auth;
use App\Models\Prestasi;

class Myprestasi extends Component
{
    public $prestasi;

    protected $listeners=[
        'prestasiDitambahkan'=>'efekDitambahkan',
        'prestasiDiupdate'=>'mount',
        'prestasiFixHapus'=>'delete'
    ];

    public function mount()
    {
        $this->prestasi=auth::user()->mahasiswa->prestasi;
    }

    public function render()
    {


        return view('livewire.myprestasi',compact(['prestasi']));
    }



    //LISTENERS
    public function efekDitambahkan($newPrestasi)
    {
        // $this->mount();
        $newPrestasi=Prestasi::find($newPrestasi['id']);
        $this->prestasi->push($newPrestasi);

    }


    //CUSTOM METHOD
    public function delete($id)
    {
        $toDelete=Prestasi::find($id);
        $toDelete->delete();
        $this->mount();
    }

    public function bukaTambah()
    {
        $this->emit('bukaTambahPrestasi');
    }

    public function bukaUpdate($id)
    {
        $this->emit('bukaUpdatePrestasi',$id);
    }



}
