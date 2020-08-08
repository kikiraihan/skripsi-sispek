<?php

namespace App\Http\Livewire\Mahasiswa;

use Livewire\Component;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\User;
use Livewire\WithPagination;
use auth;
use Illuminate\Database\Eloquent\Builder;

class All extends Component
{
    use WithPagination;

    public
    $search,
    $jumlah_mahasiswa,
    $prodi;


    protected $listeners=[
        'mahasiswaPADitambahkan'=>'mount',
        'mahasiswaPADiupdate'=>'mount'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingProdi()
    {
        $this->resetPage();
    }


    public function mount()
    {
        $this->prodi="S1 - Sistem Informasi";
    }


    public function render()
    {
        if(auth::user()->hasRole('Kaprodi'))
        $this->prodi=auth::user()->dosen->kaprodi->prodi;

        //kalau prodi kosong brrti tampilkan mahasiswa BA
        $mahasiswa=$this->inisialMahasiswaPerProdi($this->prodi);

        return view('livewire.mahasiswa.all',[
            'mahasiswa' => $mahasiswa->paginate(6),
        ]);
    }


    public function inisialMahasiswaPerProdi($prodi)
    {
        $mahasiswa=Mahasiswa::where('prodi',$prodi)
        ->where(function(Builder $query){
            return $query
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orWhere('nim', 'like', '%'.$this->search.'%');
        })
        ;
        $this->jumlah_mahasiswa=$mahasiswa->count();
        return $mahasiswa;
    }



}
