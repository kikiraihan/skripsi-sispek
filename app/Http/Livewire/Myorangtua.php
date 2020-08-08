<?php

namespace App\Http\Livewire;

use Livewire\Component;
use auth;
use App\Models\Orangtua;

class Myorangtua extends Component
{
    public $orangtua;

    protected $listeners=[
        'orangtuaDitambahkan'=>'efekDitambahkan',
        'orangtuaDiupdate'=>'mount',
        'orangtuaFixHapus'=>'delete'
    ];

    public function mount()
    {
        $this->orangtua=auth::user()->mahasiswa->orangtua;
    }

    public function render()
    {
        return view('livewire.myorangtua');
    }



    //LISTENERS
    public function efekDitambahkan($newOrangtua)
    {
        // $this->mount();
        $newOrangtua=Orangtua::find($newOrangtua['id']);
        $this->orangtua->push($newOrangtua);

    }


    //CUSTOM METHOD
    public function delete($id)
    {
        $toDelete=Orangtua::find($id);
        $toDelete->delete();
        $this->mount();
    }

    public function bukaTambah()
    {
        $this->emit('bukaTambahOrangtua');
    }

    public function bukaUpdate($id)
    {
        $this->emit('bukaUpdateOrangtua',$id);
    }



}
