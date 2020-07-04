<?php

namespace App\Http\Livewire\Rekomendasi;

use Livewire\Component;
use App\Models\Masterkriteria as Kriteria;
use App\Models\Matakuliah;
use Illuminate\Database\QueryException;
use Livewire\WithPagination;

class Masterkriteria extends Component
{

    use WithPagination;

    public $search;
    // public $kriteria;

    protected $listeners=[
        'kriteriaDitambahkan'=>'mount',
        'kriteriaDiupdate'=>'mount'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        // $this->kriteria=Kriteria::paginate(10);
    }

    public function render()
    {

        return view('livewire.rekomendasi.masterkriteria',[
            'kriteria' => Kriteria::where('title', 'like', '%'.$this->search.'%')->paginate(10),
        ]);
    }



    //LISTENERS
    public function efekDitambahkan($newKriteria)
    {
        $this->mount();
        // $newKriteria=Kriteria::find($newKriteria['id']);
        // $this->kriteria->push($newKriteria);
    }


    //CUSTOM METHOD
    public function delete($id)
    {
        $toDelete=Kriteria::find($id);
        $toDelete->delete();
        $this->mount();
    }

    public function bukaTambah()
    {
        $this->emit('bukaTambahKriteria');
    }

    public function bukaUpdate($id)
    {
        $this->emit('bukaUpdateKriteria',$id);
    }




    public function ImportNilaiMK()
    {
        $counter=0;
        $matakuliah=Matakuliah::all();

        //foreach
        foreach($matakuliah as $mk)
        {
            $kodemk=$mk->kodemk;
            $namamk=$mk->nama;

            $pathToTemplate="matakuliah()->where('kodemk','".$kodemk."')->first()->pivot->angka_mutu";
            $model_typeTemplate="App\Models\Mahasiswa";

            //cari path dirender
            $kriteria=new Kriteria;
            $kriteria->setPathToFromString($pathToTemplate);
            $pathToRendered=$kriteria->pathTo;

            $cek=Kriteria::where('pathTo',$pathToRendered)->where('model_type',$model_typeTemplate);
            if($cek->get()->isEmpty())
            {
                $kriteria=new Kriteria;
                $kriteria->model_type   =$model_typeTemplate;

                $kriteria->setPathToFromString($pathToTemplate);

                $kriteria->title        ="nilai MK : ".$namamk;
                $kriteria->jenis        ='angka';
                $kriteria->rasio        =null;
                $kriteria->save();
                $counter++;
            }
        }




        // try {
        //     // Validate the value...
        // }
        // catch (QueryException $e)
        // {
        //     report($e);

        //     return false;
        // }




        $this->mount();

        // toast('berhasil ditambahkan '.$counter.' kriteria matakuliah!','success');
        return session()->flash('message', 'berhasil ditambahkan '.$counter.' kriteria nilai matakuliah!');
    }


}
