<?php

namespace App\Http\Livewire\Mahasiswa;

use Livewire\Component;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\User;
use Livewire\WithPagination;
use auth;
use Illuminate\Database\Eloquent\Builder;


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
        // ->where('id_dosen_pa', auth::user()->dosen->id)
        // harus dibungkus where.. karena kalau tidak maka tidak akan terbaca per Mahasiswa PA
        ->where(function(Builder $query){
            return $query
            ->where('nama', 'like', '%'.$this->search.'%')
            ->orWhere('nim', 'like', '%'.$this->search.'%');
        })
        ;
        $this->jumlah_mahasiswa=$mahasiswa->count();

        return view('livewire.mahasiswa.mahasiswapa',[
            'mahasiswa' => $mahasiswa->paginate(6),
        ]);
    }
}
