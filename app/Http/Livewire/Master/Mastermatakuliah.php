<?php

namespace App\Http\Livewire\Master;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Matakuliah;
use App\Helpers\General\CollectionHelper;
use auth;

class Mastermatakuliah extends Component
{
    use WithPagination;

    public
    $search,
    $jlh_matakuliah,
    $mengulangsaja
    ;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function mount()
    {
        $this->mengulangsaja=false;
    }

    public function render()
    {
        $matakuliah=Matakuliah::where('nama', 'like', '%'.$this->search.'%');
        $user=Auth::user();

        if ($user->isDosenKaprodi()) {
            $matakuliah->where('prodi', $user->dosen->kaprodi->prodi);
        }

        if($this->mengulangsaja==true)
        {
            $matakuliah->whereHas('mahasiswanilaie');
        }
        $this->jlh_matakuliah=$matakuliah->count();


        return view('livewire.master.mastermatakuliah',[
            'matakuliah' => CollectionHelper::paginate($matakuliah->get()->sortByDesc('mahasiswamengulang'),20),
        ]);
    }
}
