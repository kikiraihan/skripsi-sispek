<?php

namespace App\Http\Livewire\Rekomendasi;

use Livewire\Component;
use App\Models\Masterkriteria as Kriteria;

class Masterkriteriainput extends Component
{
    public $metode;
    public $formTitle;

    protected $listeners=[
        'bukaTambahKriteria'=>'inputTambah',
        'bukaUpdateKriteria'=>'inputUpdate',
    ];

    public $idToUpdate;
    // public $id_mahasiswa;
    // public $status;//valid
    // public $sertifikat;

    public $title;
    public $model_type;
    public $jenis;
    public $pathTo;
    public $rasio;

    public function rasioRowBaru(){
        $baru=[
            'pilihan'=>'ini pilihan',
            'nilai'=>'1',
        ];
        $this->rasio[]=$baru;
    }

    public function rasioRowDelete($key)
    {
        unset($this->rasio[$key]);
        if($this->rasio==[])
        {
            $this->rasio='';
        }
    }


    public function mount()
    {
        //mount tidak diperlukan lagi karena input Tambah
    }

    public function render()
    {
        // $this->rasio[0]['pilihan']='';
        // $this->rasio[0]['nilai']='';
        return view('livewire.rekomendasi.masterkriteriainput');
    }

    public function inputTambah()
    {
        $this->reset();
        $this->metode="newKriteria";
        $this->formTitle="Kriteria Baru Saya";
        $this->model_type="";
    }

    public function inputUpdate($id)
    {
        $this->reset();
        $kriteria=Kriteria::find($id);

        $this->idToUpdate       =$id;


        $this->title            =$kriteria->title;
        $this->model_type       =$kriteria->model_type;
        $this->jenis            =$kriteria->jenis;

        //rasio
        if($kriteria->rasio!=null)
        {
            foreach($kriteria->RasioRenderArray as $pilihan=>$nilai)
            {
                $baru=[
                    'pilihan'=>$pilihan,
                    'nilai'=>$nilai,
                ];
                $this->rasio[]=$baru;
            }
        }
        else
        {
            $this->rasio=null;
        }

        //pathTo
        $this->pathTo           =$kriteria->PathToRenderString;


        $this->metode="updateKriteria";
        $this->formTitle="Update Kriteria";
    }


    public function newKriteria()
    {
        //validasi
        $CustomMessages = [
            'integer' => 'Kolom :attribute, harus berupa angka',
            'string' => 'Kolom :attribute, harus berupa angka',
            'date' => 'Kolom :attribute, harus berupa tanggal',
            'required'=>'Kolom :attribute tidak boleh kosong',
            'unique'=>'Data kolom :attribute sudah ada sebelumnya',
            'array'=>'Kolom :attribute harus berupa array',
        ];

        $ini=$this->validate( [

            'title'         =>"required|string",
            'model_type'    =>"required|string",
            'jenis'         =>"required|string|in:angka,non angka",
            'pathTo'        =>"required|string",
            'rasio'         =>"nullable|array",

        ],$CustomMessages);


        $kriteria=new Kriteria;
        $kriteria->title   =$this->title;
        $kriteria->model_type   =$this->model_type;
        $kriteria->jenis        =$this->jenis;

        //rasio
        if($this->rasio!='')
        {
            foreach($this->rasio as $ini) $baru[$ini['pilihan']]=$ini['nilai'];
            $this->rasio=$baru;
            $kriteria->setRasioFromArray($this->rasio);
        }
        else
        {
            $kriteria->rasio=null;
        }

        //pathTo
        $kriteria->setPathToFromString($this->pathTo);
        $kriteria->save();

        $this->reset();
        $this->inputTambah();
        $this->emit('kriteriaDitambahkan');
    }


    public function updateKriteria()
    {

        //validasi
        $CustomMessages = [
            'integer' => 'Kolom :attribute, harus berupa angka',
            'string' => 'Kolom :attribute, harus berupa angka',
            'date' => 'Kolom :attribute, harus berupa tanggal',
            'required'=>'Kolom :attribute tidak boleh kosong',
            'unique'=>'Data kolom :attribute sudah ada sebelumnya',
            'array'=>'Kolom :attribute harus berupa array',
        ];

        $ini=$this->validate( [
            'title'         =>"required|string",
            'model_type'    =>"required|string",
            'jenis'         =>"required|string|in:angka,non angka",
            'pathTo'        =>"required|string",
            'rasio'         =>"nullable|array",
        ],$CustomMessages);



        $kriteria=Kriteria::find($this->idToUpdate);

        $kriteria->title        =$this->title;
        $kriteria->model_type   =$this->model_type;
        $kriteria->jenis        =$this->jenis;

        //rasio
        if($this->rasio!='')
        {
            foreach($this->rasio as $ini) $baru[$ini['pilihan']]=$ini['nilai'];
            $this->rasio=$baru;
            $kriteria->setRasioFromArray($this->rasio);
        }
        else
        {
            $kriteria->rasio=null;
        }

        //pathTo
        $kriteria->setPathToFromString($this->pathTo);


        $kriteria->save();
        $this->reset();
        $this->inputUpdate($kriteria->id);
        $this->emit('kriteriaDiupdate');
    }






}
