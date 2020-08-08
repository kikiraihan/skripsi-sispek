<?php

namespace App\Http\Livewire\Rekomendasi;

use Livewire\Component;
use App\Models\Masterkriteria as Kriteria;
use Livewire\WithPagination;
use App\Models\Masterpreferensi;
use Illuminate\Support\Facades\Auth;


class Masterpreferensiinput extends Component
{
    use WithPagination;

    public $judul;
    public $model_type;
    public $addedKriteria;
    public $matriksKriteria;
    public $orientasi;

    public $bobotKriteria;
    public $matriksNormalised;

    public $searchKriteria;
    public $searchKriteriaCount;
    public $idToDelete;
    public $cr;

    public $catatan;


    protected $listeners=[
        'setMatriksKriteria'=>'setMatriks',
    ];

    public function mount()
    {
        $this->judul='';
        $this->model_type='App\Models\Mahasiswa';
        $this->addedKriteria=[];
        $this->matriksKriteria=[];
        $this->idToDelete='';
        $this->cr=FALSE;
    }

    public function render()
    {

        if($this->searchKriteria!=null)
        {
            $kriteria=Kriteria::select('id','title','jenis')->where('title', 'like', '%'.$this->searchKriteria.'%');
            $this->searchKriteriaCount=$kriteria->count();
            $kriteria=$kriteria->orderBy('created_at','desc')
            ->paginate(5);
        }else $kriteria=[];

        return view('livewire.rekomendasi.masterpreferensiinput',[
            'kriteria' => $kriteria,
        ]);

    }






    public function addKriteria($id)
    {
        array_unshift($this->addedKriteria,$id);
        $this->matriksKriteria=[];
        $this->cr=FALSE;

        //buat kolom orientasi
        $this->orientasi[$id]='benefit';
    }

    public function deleteAddedKriteria($id)
    {
        $this->idToDelete=$id;
        $ini=[];

        $filtered =
        array_filter($this->addedKriteria, function ($var) {
            return ($var != $this->idToDelete);
        });
        $this->addedKriteria=[];
        foreach ($filtered as $value) {
            $this->addedKriteria[]=$value;
        }


        //RESET
        $this->idToDelete='';
        $this->matriksKriteria=[];
        $this->cr=FALSE;


        //buat kolom orientasi
        unset($this->orientasi[$id]);
    }



    public function buatMatriks($ordo)
    {
        $matriks=[];
        for ($baris = 0; $baris < $ordo; $baris++)
        {
            for ($kolom = 0; $kolom < $ordo; $kolom++) {
                if ($baris==$kolom)
                {
                    $matriks[$baris][$kolom]=1;
                }
                else
                {
                    $matriks[$baris][$kolom]=0;
                }
            }
        }
        return $matriks;
    }


    public function prosesKriteria()
    {
        $ordo=count($this->addedKriteria);
        if ($ordo>=3) {
            $this->matriksKriteria=$this->buatMatriks($ordo);
        }
        else
        $this->emit(
            'swalAlertDanger',
            'Terjadi Kesalahan',
            "minimal 3 kriteria"
        );
        }




    public function getTitleOfKriteria($id)
    {
        return Kriteria::find($id)->title;
    }


    public function openInputMatriks($baris,$kolom,$barisId,$kolomId, $valueSebelumnya)
    {
        // $barisTitle=explode('-',str_replace('nilai:','',$this->getTitleOfKriteria($barisId)))[0];
        // $kolomTitle=explode('-',str_replace('nilai:','',$this->getTitleOfKriteria($kolomId)))[0];

        $barisTitle=str_replace('nilai:','',$this->getTitleOfKriteria($barisId));
        $kolomTitle=str_replace('nilai:','',$this->getTitleOfKriteria($kolomId));

        $this->emit('swalInputMatriks',$baris,$kolom,$barisTitle,$kolomTitle, $valueSebelumnya);
    }

    public function setMatriks($a,$b,$value)
    {
        $value=(int)$value;

        if($value==0)
        {
            $this->matriksKriteria[$a][$b]=0;
            $this->matriksKriteria[$b][$a]=0;
        }
        elseif($value==1)
        {
            $this->matriksKriteria[$a][$b]=1;
            $this->matriksKriteria[$b][$a]=1;
        }
        elseif($value>0)
        {
            $this->matriksKriteria[$a][$b]=$value;
            $this->matriksKriteria[$b][$a]='1/'.$value;
        }
        elseif($value<0)
        {
            $value=$value*-1;
            $this->matriksKriteria[$a][$b]='1/'.$value;
            $this->matriksKriteria[$b][$a]=$value;
        }

        $this->cr=FALSE;
        $this->matriksNormalised=FALSE;

    }



    public function normalise($matriks,$sumCol)
    {
        $normalised=[];
        for( $baris = 0; $baris < count($matriks); $baris++)
        {
            for( $kolom = 0; $kolom < count($matriks); $kolom++)
            {
                $normalised[$baris][$kolom] = $matriks[$baris][$kolom]/$sumCol[$kolom];
            }
        }
        return $normalised;
    }





    //nanti beken trait
    public function sumColumns($matriks){
        $sumCol=[];
        for( $kolom = 0; $kolom < count($matriks); $kolom++){
            $sumCol[$kolom]=0;
            for( $baris = 0; $baris < count($matriks); $baris++){
                $sumCol[$kolom]=$sumCol[$kolom]+$matriks[$baris][$kolom];
            }
        }
        return $sumCol;//array sumColumns per Column
    }


    public function sumRows($matriks){
        $sumRow=[];
        for($baris = 0; $baris < count($matriks); $baris++){
            $sumRow[$baris]=0;
            for($kolom = 0; $kolom < count($matriks); $kolom++){
                $sumRow[$baris]=$sumRow[$baris]+$matriks[$baris][$kolom];
            }
        }
        return $sumRow;//array sumRows per Row
    }

    public function averageRows($matriks)
    {
        $sumRow=$this->sumRows($matriks);
        for($i = 0; $i < count($sumRow); $i++){
            $sumRow[$i]=$sumRow[$i]/count($sumRow);
            // $sumRow[i]=$sumRow[i].toFixed(2);
        }
        return $sumRow;//array averageRows per Row
    }


    public function averageOrdoSatu($matriks)
    {
        $hasil=0;
        for($z = 0; $z < count($matriks); $z++){
            $hasil+=$matriks[$z];
        }
        return $hasil/count($matriks);//satu nilai
    }


    public function cekKonsistensi($matriks,$bobotKriteria)
    {
        //weighted sum value(hasil kali $matriks pairwaise dan $matriks bobotkriteria)
        $weightedPairwaise=[];
        for($i = 0; $i < count($matriks); $i++)
        {
            $weightedPairwaise[$i]=0;
            for($z = 0; $z < count($matriks); $z++){
                $weightedPairwaise[$i]=$weightedPairwaise[$i]+($matriks[$i][$z]*$bobotKriteria[$z]);
            }
        }
        //lambda
        $lambda=[];
        for($z = 0; $z < count($matriks); $z++)
        {
            $lambda[$z]=$weightedPairwaise[$z]/$bobotKriteria[$z];
        }
        $lambda=$this->averageOrdoSatu($lambda);
        //cr
        $ci=($lambda-count($matriks))/(count($matriks)-1);
        $ir=1.98*(count($matriks)-2)/count($matriks);
        $cr=$ci/$ir;

        if ($cr<0.10) return [true,$cr];
        else return [false,$cr];
    }



    public function konversiKeDesimal($matriks)
    {

        //ambil nilai dari tag input
        for( $i = 0; $i < count($matriks); $i++)
        {
            for( $z = 0; $z < count($matriks); $z++)
            {
                //cek apakah mengandung 1/
                if(strpos($matriks[$i][$z], "1/") !== false)
                {
                    // explode pake /, kemudian bagikan
                    $bagi=explode("/",$matriks[$i][$z]);
                    $matriks[$i][$z]=$bagi[0]/$bagi[1];
                    // dd($matriks[$i][$z]);
                }
                else
                {
                    //next
                    // dd("Word Not Found!");
                }
            }
        }

        return $matriks;

    }


    protected function simpanKolomKriteria($newPreferensi)
    {
        $kriteria=$this->addedKriteria;
        $orientasi=$this->orientasi;
        $bobotKriteria=$this->bobotKriteria;
        $return=[];


        for ($i=0; $i < count($kriteria); $i++) {
            $return[$kriteria[$i]]=
            [
                "jenis"=>$orientasi[$kriteria[$i]],
                "bobot"=>$bobotKriteria[$i],
            ];
        }

        $newPreferensi->kriteria=json_encode($return);

    }







    public function prosesNormalisasi()
    {
        $matriks=$this->matriksKriteria;
        //konversi matriks ke desimal
        $matriks=$this->konversiKeDesimal($matriks);

        // sum col matriks
        $sumCol=$this->sumColumns($matriks);

        // normalisasi matriks
        $this->matriksNormalised=$this->normalise($matriks,$sumCol);

        //hitung bobot/w/vector/rata2 baris
        $this->bobotKriteria=$this->averageRows($this->matriksNormalised);

        //cek konsistensi
        $cek=$this->cekKonsistensi($matriks,$this->bobotKriteria);
        $this->cr=$cek[1];

        if ($cek[0])
        {

            $this->emit(
                'swalAlertSuccess',
                'Konsisten',
                'diperoleh CR = '.round($cek[1],3)
            );
        }
        else
        {

            $this->emit(
                'swalAlertDanger',
                'CR = '.round($cek[1],3),
                "Consistency Rasio harus kurang dari 0,1. Periksa kembali perbandingan berpasangan"
            );

        }
    }


    public function prosesSimpan()
    {
        if ($this->judul==NULL)
        {
            return $this->emit(
                'swalAlertDanger',
                'Terjadi Kesalahan',
                "Anda belum mengisi kolom judul dibagian awal"
            );
        }
        elseif ($this->model_type==NULL)
        {
            return $this->emit(
                'swalAlertDanger',
                'Terjadi Kesalahan',
                "Anda belum mengisi kolom model type dibagian awal"
            );
        }


        $newPreferensi = new Masterpreferensi;
        $newPreferensi->id_user   = AUTH::user()->id;
        $newPreferensi->catatan   = $this->catatan;
        $newPreferensi->judul   = $this->judul;
        $newPreferensi->model_type   = $this->model_type;
        $newPreferensi->ordo    = count($this->matriksKriteria);
        $newPreferensi->matriks = json_encode($this->matriksKriteria);
        $newPreferensi->matriksNormalised = json_encode($this->matriksNormalised);
        $this->simpanKolomKriteria($newPreferensi);
        $newPreferensi->save();

        $this->emit(
            'swalAlertSuccess',
            'Berhasil',
            "Preferensi baru telah ditambahkan"
        );

        // redirect()->route('home');

        $this->reset();
        $this->mount();
    }



















    // Computed Property
    protected function getKriteriaTerpilihInNamaProperty()
    {
        if($this->addedKriteria!=null)
        {
            foreach ($this->addedKriteria as $id) {
                $kriteriaTerpilih[]=Kriteria::find($id)->title;
            }
            return $kriteriaTerpilih;
        }
        else return [];
    }

    protected function getKriteriaTerpilihInModelProperty()
    {
        if($this->addedKriteria!=null)
        {
            foreach ($this->addedKriteria as $id) {
                $kriteriaTerpilih[]=Kriteria::find($id);
            }
            return $kriteriaTerpilih;
        }
        else return [];
    }








}
