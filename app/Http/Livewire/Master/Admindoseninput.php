<?php

namespace App\Http\Livewire\Master;

use Livewire\Component;
use auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Kaprodi;
use App\Models\Kajur;

class Admindoseninput extends Component
{
    public $metode;
    public $formTitle;

    protected $listeners=[
        'bukaTambahAdminDosen'  =>  'inputTambah',
        'bukaUpdateAdminDosen'  =>  'inputUpdate',
        'bukaSetAsKajur'        =>  'inputSetAsKajur',
        'bukaSetAsKaprodi'      =>  'inputSetAsKaprodi',
    ];

    public $idUserToUpdate;

    public $periode_dari;
    public $periode_sampai;//null
    public $role;

    // user
    public $username;
    public $email;
    //public $password;
    //dosen
    public $nama;
    public $nip;

    public $prodi;//kaprodi
    public $jurusan;//jurusan
    // public $periode;

    public $inicustommessage;



    public function mount()
    {
        $this->periode_dari='';
        $this->periode_sampai='';
    }


    public function render()
    {
        $this->inicustommessage=[
            // 'integer' => 'Kolom :attribute, harus berupa angka',
            'string' => 'Kolom :attribute, harus berupa angka',
            'date' => 'Kolom :attribute, harus berupa tanggal',
            'required'=>'Kolom :attribute tidak boleh kosong',
            'unique'=>'Data kolom :attribute sudah ada sebelumnya',
        ];
        $yearRange=range(Carbon::now()->year-10,Carbon::now()->year+10);
        return view('livewire.master.admindoseninput',compact(['yearRange']));
    }


    public function inputTambah()
    {
        $this->reset();
        $this->metode="newAdminDosen";
        $this->formTitle="User Baru";
    }


    public function inputUpdate($id)
    {
        $this->reset();
        $user=User::find($id);
        $this->idUserToUpdate      = $id;
        $this->inisialPerRole($user);

        $this->username             = $user->username;
        $this->email                = $user->email;

        $this->metode="updateAdminDosen";
        $this->formTitle="Update User";
    }

    protected function inisialPerRole($user)
    {
        if($user->hasRole('Kaprodi'))
        {
            $this->role             = "Kaprodi";
            $this->nama             = $user->dosen->nama;
            $this->nip              = $user->dosen->nip;
            $this->prodi            = $user->dosen->kaprodi->prodi;
            $periode                = explode('-',$user->dosen->kaprodi->periode);
            $this->periode_dari     = $periode[0];
            $this->periode_sampai   = $periode[1];
        }
        elseif($user->hasRole('Kajur'))
        {
            $this->role= "Kajur";
            $this->nama=$user->dosen->nama;
            $this->nip=$user->dosen->nip;
            $this->jurusan=$user->dosen->kajur->jurusan;
            $periode=explode('-',$user->dosen->kajur->periode);
            $this->periode_dari=$periode[0];
            $this->periode_sampai=$periode[1];
        }
        elseif($user->hasRole('Admin'))
        {
            $this->role= "Admin";
        }
        elseif($user->hasRole('Dosen'))
        {
            $this->role= "Dosen";
            $this->nama=$user->dosen->nama;
            $this->nip=$user->dosen->nip;
        }

    }




    public function inputSetAsKajur($id_user)
    {
        $this->reset();
        $this->role="Kajur";
        $this->metode="setAsKajur";
        $this->formTitle="Set As Kajur";
        $this->idUserToUpdate=$id_user;
    }

    public function inputSetAsKaprodi($id_user)
    {
        $this->reset();
        $this->role="Kaprodi";
        $this->metode="setAsKaprodi";
        $this->formTitle="Set As Kaprodi";
        $this->idUserToUpdate=$id_user;
    }

    public function setAsKajur()
    {
        $user=User::find($this->idUserToUpdate);
        $user->assignRole('Kajur');

        $user=$this->simpanKredensialKajur($user,$this->inicustommessage);

        $this->reset();
        $this->emit('telahDisetKajur',$user);
        $this->emit('tutupModal');
        $this->emit('swalUpdated');
    }

    public function setAsKaprodi()
    {
        $user=User::find($this->idUserToUpdate);
        $user->assignRole('Kaprodi');

        $user=$this->simpanKredensialKaprodi($user,$this->inicustommessage);

        $this->reset();
        $this->emit('telahDisetKaprodi',$user);
        $this->emit('tutupModal');
        $this->emit('swalUpdated');
    }


    public function newAdminDosen()
    {
        //validasi
        $CustomMessages = $this->inicustommessage;

        $ini=$this->validate([
            'username'     =>"required|string",
            'email'        =>"required|email",
            'role'         =>"required|string",
        ],$CustomMessages);

        $user=new User;
        $user->username =$this->username;
        $user->email    =$this->email;
        $user->password ="password";
        $user->save();

        $this->simpanRole($user,$CustomMessages);

        $this->reset();
        $this->emit('adminDosenDitambahkan',$user);
        $this->emit('tutupModal');
        $this->emit('swalAdded',1);
    }

    protected function simpanRole($user,$CustomMessages)
    {
        if ($this->role=="Admin")
        {
            $user->assignRole('Admin');
        }

        elseif($this->role=="Dosen")
        {
            $user->assignRole('Dosen');
            $user=$this->simpanKredensialDosen($user,$CustomMessages);
        }
        elseif($this->role=="Kaprodi")
        {
            $user->assignRole('Dosen');
            $user->assignRole('Kaprodi');
            $user=$this->simpanKredensialDosen($user,$CustomMessages);
            $user=$this->simpanKredensialKaprodi($user,$CustomMessages);
        }
        elseif($this->role=="Kajur")
        {
            $user->assignRole('Dosen');
            $user->assignRole('Kajur');
            $user=$this->simpanKredensialDosen($user,$CustomMessages);
            $user=$this->simpanKredensialKajur($user,$CustomMessages);
        }

    }


    protected function simpanKredensialDosen($user,$CustomMessages)
    {
        $ini=$this->validate([
            'nama'              =>"required|string",
            'nip'               =>"required",
        ],$CustomMessages);

        $dosen          = new Dosen;
        $dosen->nama    = $this->nama;
        $dosen->nip     = $this->nip;

        $user->dosen()->save($dosen);
        return $user;
    }

    protected function simpanKredensialKaprodi($user,$CustomMessages)
    {
        $ini=$this->validate([
            'prodi'             =>"required|string",
            'periode_dari'      =>"required|string",
            'periode_sampai'    =>"required|string",
        ],$CustomMessages);

        $kaprodi            = new Kaprodi;
        $kaprodi->prodi     = $this->prodi;
        $kaprodi->periode   = $this->periode_dari." - ".$this->periode_sampai;

        $user->dosen->kaprodi()->save($kaprodi);
        return $user;
    }

    protected function simpanKredensialKajur($user,$CustomMessages)
    {
        $ini=$this->validate([
            'jurusan'             =>"required|string",
            'periode_dari'      =>"required|string",
            'periode_sampai'    =>"required|string",
        ],$CustomMessages);

        $kajur            = new Kajur;
        $kajur->jurusan   = $this->jurusan;
        $kajur->periode   = $this->periode_dari." - ".$this->periode_sampai;

        $user->dosen->kajur()->save($kajur);
        return $user;
    }


    public function updateAdminDosen()
    {
        //validasi
        $CustomMessages = $this->inicustommessage;

        $ini=$this->validate([
            'username'     =>"required|string",
            'email'        =>"required|email",
            'role'         =>"required|string",
        ],$CustomMessages);


        $user= User::find($this->idUserToUpdate);
        $user->username =$this->username;
        $user->email    =$this->email;
        $user->password ="password";
        $user->save();

        //jangan lupa perbaruiKredensial disini
        $this->perbaruiKredensial($user,$CustomMessages);

        $this->reset();
        $this->emit('adminDosenDitambahkan',$user);
        $this->emit('tutupModal');
        $this->emit('swalUpdated');
    }



    protected function perbaruiKredensial($user,$CustomMessages)
    {
        $roleSebelumnya=$this->cekRolle($user);

        if ($roleSebelumnya=="Admin")
        {

        }
        elseif($roleSebelumnya=="Kaprodi")
        {
            $user=$this->updateKredensialDosen($user,$CustomMessages);
            $user=$this->updateKredensialKaprodi($user,$CustomMessages);
        }
        elseif($roleSebelumnya=="Kajur")
        {
            $user=$this->updateKredensialDosen($user,$CustomMessages);
            $user=$this->updateKredensialKajur($user,$CustomMessages);
        }
        elseif($roleSebelumnya=="Dosen")
        {
            $user=$this->updateKredensialDosen($user,$CustomMessages);
        }
    }


    public function cekRolle($user)
    {
        if($user->hasRole('Kaprodi'))
        {
            return "Kaprodi";
        }
        elseif($user->hasRole('Kajur'))
        {
            return  "Kajur";
        }
        elseif($user->hasRole('Admin'))
        {
            return  "Admin";
        }
        elseif($user->hasRole('Dosen'))
        {
            return  "Dosen";
        }

    }

    protected function updateKredensialDosen($user,$CustomMessages)
    {
        $ini=$this->validate([
            'nama'              =>"required|string",
            'nip'               =>"required",
        ],$CustomMessages);

        $dosen          = $user->dosen;
        $dosen->nama    = $this->nama;
        $dosen->nip     = $this->nip;

        $user->dosen()->save($dosen);
        return $user;
    }



    protected function updateKredensialKaprodi($user,$CustomMessages)
    {
        $ini=$this->validate([
            'prodi'             =>"required|string",
            'periode_dari'      =>"required|string",
            'periode_sampai'    =>"required|string",
        ],$CustomMessages);

        $kaprodi            = $user->dosen->kaprodi;
        $kaprodi->prodi     = $this->prodi;
        $kaprodi->periode   = $this->periode_dari." - ".$this->periode_sampai;

        $user->dosen->kaprodi()->save($kaprodi);
        return $user;
    }




    protected function updateKredensialKajur($user,$CustomMessages)
    {
        $ini=$this->validate([
            'jurusan'             =>"required|string",
            'periode_dari'      =>"required|string",
            'periode_sampai'    =>"required|string",
        ],$CustomMessages);

        $kajur            = $user->dosen->kajur;
        $kajur->jurusan   = $this->jurusan;
        $kajur->periode   = $this->periode_dari." - ".$this->periode_sampai;

        $user->dosen->kajur()->save($kajur);
        return $user;
    }





















}
