<?php

namespace App\Http\Livewire\Rekomendasi;

use Livewire\Component;
use App\Models\Masterpreferensi as Preferensi;
use Livewire\WithPagination;

class Rekomendasiotomatis extends Component
{

    use WithPagination;

    public $searchPreferensi;
    public $searchPreferensiCount;

    public $preferensiToGenerate;


    public function mount()
    {
        $this->preferensiToGenerate=FALSE;
    }

    public function render()
    {

            $preferensi=Preferensi::where('judul', 'like', '%'.$this->searchPreferensi.'%');
            $this->searchPreferensiCount=$preferensi->count();
            $preferensi=$preferensi->orderBy('created_at','desc')
            ->paginate(4);


        return view('livewire.rekomendasi.rekomendasiotomatis',[
            'preferensi' => $preferensi,
        ]);
    }

    public function setPreferensiToGenerate($id)
    {
        // dd(Preferensi::find($id));
        $this->preferensiToGenerate=Preferensi::find($id);
        $this->emit(
            'swalAlertSuccess',
            'Preferensi Dipilih',
            $this->preferensiToGenerate->judul
        );
    }


}
