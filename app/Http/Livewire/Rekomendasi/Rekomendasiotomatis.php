<?php

namespace App\Http\Livewire\Rekomendasi;

use Livewire\Component;
use App\Models\Masterpreferensi as Preferensi;
use App\Models\Masterkriteria as Kriteria;
use Livewire\WithPagination;
use App\Traits\manipulasiMatriksTopsis as MatriksTopsis;
use App\Traits\StringParser;

class Rekomendasiotomatis extends Component
{
    use MatriksTopsis;
    use StringParser;
    use WithPagination;

    public $searchPreferensi;
    public $searchPreferensiCount;

    public $preferensiToGenerate;

    public $ranked;
    public $matriks;

    //reset the page after filtering data
    public function updatingSearchPreferensi()
    {
        $this->resetPage();
    }


    public function mount()
    {
        $this->preferensiToGenerate=FALSE;
    }

    public function render()
    {
        $preferensi = Preferensi::where('judul', 'like', '%'.$this->searchPreferensi.'%');
        $this->searchPreferensiCount=$preferensi->count();
        $preferensi =
        $preferensi
        ->orderBy('created_at','desc')
        ->paginate(4);


        return view('livewire.rekomendasi.rekomendasiotomatis',[
            'preferensi' => $preferensi,
            'modelRanked'=>$this->getModelRanked(),
        ]);
    }



    public function getModelRanked()
    {
        $mahasiswaRangked=[];
        if ($this->ranked and $this->ranked!="setara")
        {
            arsort($this->ranked);
            foreach ($this->ranked as $id_mahasiswa => $value)
            {
                $preferensi=$this->preferensiToGenerate;
                $mahasiswaRangked[$id_mahasiswa]['model']=$preferensi->model_type::find($id_mahasiswa);
                $mahasiswaRangked[$id_mahasiswa]['rank']=$this->ranked[$id_mahasiswa]['nilai'];
            }
            return $mahasiswaRangked;
        }
        else
        return $this->ranked; //kalau setara ['setara'] atau kosong [false]
    }






    public function getMatriksTitleRender()
    {
        foreach ($this->matriks as $id_model => $perModel)
        {
            foreach ($perModel as $id_kriteria => $value)
            {
                $nama=$this->preferensiToGenerate->model_type::find($id_model)->nama;
                $title=Kriteria::find($id_kriteria)->title;
                $return[$nama][$id_kriteria]=$value;
            }
        }
        return $return;
    }




    public function getKriteriaTitleRender()
    {
        foreach (json_decode($this->preferensiToGenerate->kriteria) as $id_kriteria=>$value)
        {
            $title=Kriteria::find($id_kriteria)->title;
            $title=str_replace('nilai:','',$title);
            // $title=$this->get_string_between($title, "nilai:", '-');
            $return[$title]=$value;
        }
        return $return;
    }

    public function getTitleOfKriteria($id)
    {
        return Kriteria::find($id)->title;
    }





    public function setPreferensiToGenerate($id)
    {
        $this->preferensiToGenerate=Preferensi::find($id);
        $this->emit(
            'swalAlertSuccess',
            'Preferensi Dipilih',
            $this->preferensiToGenerate->judul
        );
        $this->ranked=FALSE;
    }

    public function lihatPreferensi($id)
    {
        dd($id);
    }

    public function generate()
    {
        $preferensi=$this->preferensiToGenerate;
        // $preferensi->model_type::find(1);
        $filteredMahasiswa  = $preferensi->model_type::all();//App Model Mahasiswa
        $kriteria           = json_decode($preferensi->kriteria);
        // dd($kriteria);

        foreach($filteredMahasiswa as $m)
        {
            foreach($kriteria as $id_mkriteria=>$k)
            {
                $kri=Kriteria::find($id_mkriteria);

                if (!$kri->rasio OR $kri->jenis="angka")
                {
                    //jenis angka
                    $matriks[$m->id][$id_mkriteria]=
                    Kriteria::find($id_mkriteria)->PathToRenderModel($m->id)?
                    Kriteria::find($id_mkriteria)->PathToRenderModel($m->id):1;
                    //tida bisa pake $kri, mjdi null mungkin gara2 livewire
                }
                elseif ($kri->rasio OR $kri->jenis="non angka")
                {
                    $value=Kriteria::find($id_mkriteria)->PathToRenderModel($m->id);
                    // jenis non angka
                    $kriteria=json_decode(Kriteria::find($id_mkriteria)->rasio)->$value;

                }


                $k->jenis;
                $k->bobot;

            }
        }



        //normalisasi
        $matriksPembagi=$this->sumPerColumnsBerpangkatDiakarkan($matriks,$kriteria);
        $matriksNormalisedTopsis=$this->normalise($matriks,$matriksPembagi);

        //normalisasi Terbobot
        $matriksWeightedTopsis=$this->normalisedWeighted($matriksNormalisedTopsis,$kriteria);
        $maxMin=$this->kriteriaMaxMin($matriksWeightedTopsis,$kriteria);

        //matriks solusi ideal (array kriteria['jenis','positif','negatif'])
        $solusiIdeal=$this->matriksSolusiIdeal($maxMin,$kriteria);

        //jarak solusi positif dan negatig (total per alternatif)
        $dPositif=$this->distance($matriksWeightedTopsis,$solusiIdeal,"positif");
        $dNegatif=$this->distance($matriksWeightedTopsis,$solusiIdeal,"negatif");

        //nilai preferensi/akhir/rank
        $rank=$this->nilaiPreferensi($dPositif,$dNegatif,$matriksWeightedTopsis);

        $this->ranked=$rank;
        $this->matriks=$matriks;


        $this->emit(
            'swalAlertSuccess',
            'Berhasil',
            "Rekomendasi telah digenerate"
        );

    }


}
