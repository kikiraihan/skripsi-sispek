<?php

namespace App\Http\Livewire\Rekomendasi;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Masterpreferensi as Preferensi;
use App\Models\Masterkriteria as Kriteria;
use Illuminate\Support\Facades\Auth;

class Masterpreferensi extends Component
{
    use WithPagination;

    public
    $search,
    $jlh_preferensi,
    $indikator_saya,
    $indikator_umum,
    $mypref
    ;
    // public $preferensi;

    protected $listeners=[
        'preferensiFixHapus'=>'delete'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $preferensi=Preferensi::where('judul', 'like', '%'.$this->search.'%');

        $this->indikator_umum=$preferensi->count();

        $this->indikator_saya=$preferensi
        ->where('id_user', Auth::user()->id)->count();

        // $this->kriteria=Kriteria::paginate(10);
        $this->mypref=TRUE;
    }

    public function render()
    {

        $preferensi=Preferensi::where('judul', 'like', '%'.$this->search.'%');

        if($this->mypref==true)
        {
            $preferensi->where('id_user', Auth::user()->id);
        }
        $this->jlh_preferensi=$preferensi->count();

        return view('livewire.rekomendasi.masterpreferensi',[
            'preferensi' => $preferensi->orderBy('created_at','desc')->paginate(10),
        ]);
    }



    public function delete($id)
    {
        //ada di blade
        // $this->emit('swalDeleted','emitdisini','idhapus');

        $toDelete=Preferensi::find($id);
        $toDelete->delete();
        $this->mount();
    }

    public function getTitleOfKriteria($id)
    {
        return Kriteria::find($id)->title;
    }

}
