<?php

namespace App\Http\Livewire;

use Livewire\Component;
use auth;
use App\Models\Ormawa;

class Myormawa extends Component
{
    // public $ormawa;

    protected $listeners=[
        'ormawaDitambahkan'=>'efekDitambahkan',
        'ormawaDiupdate'=>'mount',
        'ormawaFixHapus'=>'delete',
    ];

    public function mount()
    {

    }

    public function render()
    {
        $ormawa=auth::user()->mahasiswa->organisasi;
        return view('livewire.myormawa',compact(['ormawa']));
    }




    //CUSTOM METHOD
    public function delete($id)
    {
        auth::user()->mahasiswa->organisasi()->detach($id);
        $this->mount();
    }

    public function bukaTambah()
    {
        $this->emit('bukaTambahOrmawa');
    }

    public function bukaUpdate($id)
    {
        $this->emit('bukaUpdateOrmawa',$id);
    }



    //LISTENERS
    public function efekDitambahkan($newOrmawa)
    {
        $this->mount();
        // $newOrmawa=Ormawa::find($newOrmawa['id']);
        // $this->ormawa->push($newOrmawa);

    }


}
