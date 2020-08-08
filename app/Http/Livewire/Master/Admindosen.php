<?php

namespace App\Http\Livewire\Master;

use Livewire\Component;
use auth;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Kaprodi;

class Admindosen extends Component
{

    protected $listeners=[
        'adminDosenDitambahkan'=>'efekDitambahkan',
        'adminDosenDiupdate'=>'mount',
        'telahDisetKajur'=>'mount',
        'telahDisetKaprodi'=>'mount',
        'adminDosenBatalkanKajur'=>'batalkanKajur',
        'adminDosenBatalkanKaprodi'=>'batalkanKaprodi',
        'adminDosenFixHapus'=>'delete',
        'adminDosenResetPassword'=>'resetPassword'
    ];

    public function mount()
    {

    }

    public function render()
    {
        $dosen = User ::role(['Dosen','Kaprodi','Kajur','Admin'])
        ->whereHas('Dosen')
        ->get();

        $admin= User ::role(['Admin'])->get();


        return view('livewire.master.admindosen',compact(['dosen','admin']));
    }



    //CUSTOM METHOD
    public function delete($id)
    {
        $user=User::find($id);

        // batalkan semua relasi dengan mahasiswa, set id pa null
        if($user->hasRole('Dosen')) $this->batalkanRelasiMahasiswaPA($user);

        $user->delete();
        $this->mount();
    }

    protected function batalkanRelasiMahasiswaPA($user)
    {
        foreach ($user->dosen->mahasiswapa as $key => $m) {
            $m->id_dosen_pa=NULL;
            $m->save();
        }
    }

    public function batalkanKajur($id)
    {
        $user=User::find($id);
        $user->dosen->kajur->delete();
        $user->removeRole("Kajur");
        $this->mount();
    }

    public function batalkanKaprodi($id)
    {
        $user=User::find($id);
        $user->dosen->kaprodi->delete();
        $user->removeRole("Kaprodi");
        $this->mount();
    }


    public function resetPassword($id)
    {
        $user=User::find($id);
        $user->password="password";
        $user->save();
        $this->mount();
    }










    public function bukaTambah()
    {
        $this->emit('bukaTambahAdminDosen');
    }

    public function bukaUpdate($id)
    {
        $this->emit('bukaUpdateAdminDosen',$id);
    }


    public function bukaSetAsKajur($id_user)
    {
        $this->emit('bukaSetAsKajur',$id_user);
    }

    public function bukaSetAsKaprodi($id_user)
    {
        $this->emit('bukaSetAsKaprodi',$id_user);
    }



    //LISTENERS
    public function efekDitambahkan($newAdminDosen)
    {
        $this->mount();
        // $newAdminDosen=AdminDosen::find($newAdminDosen['id']);
        // $this->AdminDosen->push($newAdminDosen);
    }


}
