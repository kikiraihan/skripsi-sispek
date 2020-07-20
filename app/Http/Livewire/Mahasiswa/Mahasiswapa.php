<?php

namespace App\Http\Livewire\Mahasiswa;

use Livewire\Component;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\User;
use Livewire\WithPagination;
use auth;

class Mahasiswapa extends Component
{

    use WithPagination;

    public
    $search,
    $jumlah_mahasiswa
    ;


    protected $listeners=[
        'mahasiswaPADitambahkan'=>'mount',
        'mahasiswaPADiupdate'=>'mount'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $mahasiswa=auth::user()->dosen->mahasiswapa()
        ->where('nama', 'like', '%'.$this->search.'%')
        ->orWhere('nim', 'like', '%'.$this->search.'%');
        $this->jumlah_mahasiswa=$mahasiswa->count();

        return view('livewire.mahasiswa.mahasiswapa',[
            'mahasiswa' => $mahasiswa->paginate(6),
        ]);
    }
}
