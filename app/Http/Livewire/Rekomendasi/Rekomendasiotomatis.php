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

    public $rank;
    public $matriks;

    public $filter_angkatan;
    public $filter_ipk;
    public $filter_status;
    public $filter_prodi;
    public $filter_dosenpa;




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
        if ($this->rank and $this->rank!="setara")
        {
            arsort($this->rank);
            foreach ($this->rank as $id_mahasiswa => $value)
            {
                $preferensi=$this->preferensiToGenerate;
                $mahasiswaRangked[$id_mahasiswa]['model']=$preferensi->model_type::find($id_mahasiswa);
                $mahasiswaRangked[$id_mahasiswa]['rank']=$this->rank[$id_mahasiswa]['nilai'];
            }
            return $mahasiswaRangked;
        }
        else
        return $this->rank; //kalau setara ['setara'] atau kosong [false]
    }




    public function getMatriksSortByRank($rank,$matriks)
    {
        // dd($rank);

        $return=[];
        arsort($rank);
        foreach($rank as $key=>$value)
        {
            // $this->matriks[$key]['rank']=$value['nilai'];
            // $this->matriks[$key]['matriksdetail']=$matriks[$key];
            $return[$key]=$matriks[$key];
        }
        return $return;
    }





    public function getMatriksTitleRender()
    {

        foreach (
            $this->getMatriksSortByRank($this->rank,$this->matriks)
            as $id_model => $perModel
            )
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
        // $this->emit(
        //     'swalAlertSuccess',
        //     'Preferensi Dipilih',
        //     $this->preferensiToGenerate->judul
        // );
        $this->resetUntukGenerateBaru();
    }





    public function lihatPreferensi($id)
    {
        dd($id);
    }



    public function resetUntukGenerateBaru()
    {
        $this->rank=FALSE;
        $this->matriks=FALSE;
        $this->filter_angkatan=FALSE;
        $this->filter_ipk=FALSE;
        $this->filter_status=FALSE;
        $this->filter_prodi=FALSE;
        $this->filter_dosenpa=FALSE;
    }





    public function filterBeforeGenerate($model_type)//App\Model\Mahasiswa
    {

        $model_type=$model_type::with('ipksebelumnya');


        if ($this->filter_angkatan)
            $model_type=$model_type->where('angkatan', $this->filter_angkatan);

        // if ($this->filter_ipk)
        // {
        //     $filter=explode(':',$this->filter_ipk);

        //     $model_type=$model_type::
        //     whereHas('ipksebelumnya', function ($query)
        //     {
        //         $query->orderBy();
        //         //last ipk sebelumnya
        //         //last tsb apakah (> atau <)  dari $filter[1]
        //     });
        // }

        // if ($this->filter_status)
        //     $model_type=$model_type::where('status', $this->filter_status);

        if ($this->filter_prodi)
            $model_type=$model_type->where('prodi', $this->filter_prodi);

        if ($this->filter_dosenpa)
            $model_type=$model_type->where('id_dosen_pa', $this->filter_dosenpa);



        $filteredMahasiswa=$model_type->get();



        //cek kosong
        if($filteredMahasiswa->isEmpty() or $filteredMahasiswa->count()==1)
        {
            $this->emit(
                'swalAlertDanger',
                'Error',
                "Hasil filter hanya menemukan ".$filteredMahasiswa->count()." Alternatif"
            );
            return FALSE;
        }

        return $filteredMahasiswa;
    }







    public function generate()
    {
        $preferensi=$this->preferensiToGenerate;
        // $preferensi->model_type::find(1);

        $filteredMahasiswa  = $this->filterBeforeGenerate($preferensi->model_type);
        $kriteria           = json_decode($preferensi->kriteria);

        if(!$filteredMahasiswa) return FALSE;

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

        $this->rank=$rank;
        $this->matriks=$matriks;

        $this->emit(
            'swalAlertSuccess',
            'Berhasil',
            "Rekomendasi telah digenerate"
        );

    }





}
