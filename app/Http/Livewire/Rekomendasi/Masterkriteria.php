<?php

namespace App\Http\Livewire\Rekomendasi;

use Livewire\Component;
use App\Models\Masterkriteria as Kriteria;
use App\Models\Matakuliah;
use Illuminate\Database\QueryException;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class Masterkriteria extends Component
{

    use WithPagination;

    public
    $search,
    $jlh_kriteria,
    $kriteria_nilai_mk,
    $tampilnilai
    ;
    // public $kriteria;
    

    protected $listeners=[
        'kriteriaDitambahkan'=>'efekDitambahkan',
        'kriteriaDiupdate'=>'efekDiupdate',
        'kriteriaFixHapus'=>'delete'
    ];

    //reset page after filtering data
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        // $this->kriteria=Kriteria::paginate(10);
        $this->tampilnilai=FALSE;
    }

    public function render()
    {
        $kriteria=Kriteria::where('title', 'like', '%'.$this->search.'%');
        $this->jlh_kriteria=$kriteria->count();
        $this->kriteria_nilai_mk=Kriteria::where('title', 'like', '%'.$this->search.'%')->where('title','like','%nilai :%')->count();

        if($this->tampilnilai==false)
        {
            $kriteria->where('title', 'not like', '%nilai:%');
        }

        return view('livewire.rekomendasi.masterkriteria',[
            'kriteria' => $kriteria->orderBy('created_at','desc')->paginate(10),
        ]);
    }



    //LISTENERS
    public function efekDitambahkan($newKriteria)
    {
        $this->mount();
        $this->emit('swalAdded',1);
        // $newKriteria=Kriteria::find($newKriteria['id']);
        // $this->kriteria->push($newKriteria);
    }
    public function efekDiupdate($newKriteria)
    {
        $this->mount();
        $this->emit('swalUpdated');
        // $newKriteria=Kriteria::find($newKriteria['id']);
        // $this->kriteria->push($newKriteria);
    }


    //CUSTOM METHOD
    public function delete($id)
    {
        //ada di blade
        // $this->emit('swalDeleted','emitdisini','idhapus');

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

                $kriteria->title        ="nilai:".$namamk ."-".$kodemk;
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
        $this->emit('swalAdded',$counter);
        return null;
    }


}
