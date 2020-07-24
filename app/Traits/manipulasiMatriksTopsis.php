<?php

namespace App\Traits;

trait manipulasiMatriksTopsis
{

    /**
     *===========================================================
     *                     FUNGSI MANIPULASI DATA
     *===========================================================
     * */


     //MATRIKS
    public function normalisedWeighted($normalised,$kriteria){

        foreach ($normalised as $id_mahasiswa => $perMahasiswa)
        {
            foreach ($perMahasiswa as $id_kriteria => $value)
            {
                $return[$id_mahasiswa][$id_kriteria] = $value*$kriteria->$id_kriteria->bobot;
            }
        }
        return $return;
    }

    // public function normalisedWeighted($normalised,$bobot){
    //     for($baris = 0; $baris < count($normalised); $baris++)
    //     {
    //         for($kolom = 0; $kolom < count($normalised[$baris])-1; $kolom++)//-1, kolom terakhir diabaikan
    //         {
    //             $normalised[$baris][$kolom] = $normalised[$baris][$kolom]*$bobot[$kolom];
    //         }
    //     }
    //     return $normalised;
    // }



    public function normalise($matriks,$pembagi){

        foreach ($matriks as $id_mahasiswa => $perMahasiswa)
        {
            foreach ($perMahasiswa as $id_kriteria => $value)
            {
                $return[$id_mahasiswa][$id_kriteria] = $value/$pembagi[$id_kriteria];
            }
        }
        return $return;
    }



    // public function normalise($matriks,$pembagi){
    //     for($baris = 0; $baris < count($matriks); $baris++)
    //     {
    //         for($kolom = 0; $kolom < count($matriks[$baris])-1; $kolom++)//-1, kolom terakhir diabaikan
    //         {
    //             $matriks[$baris][$kolom] = $matriks[$baris][$kolom]/$pembagi[$kolom];
    //         }
    //     }
    //     return $matriks;
    // }







    public function sumPerColumnsBerpangkatDiakarkan($matriks,$kriteria){
        $sumCol=[];

        foreach ($kriteria as $id_kriteria => $value)
        {
            $sumCol[$id_kriteria]=0;
            foreach ($matriks as $id_mahasiswa => $perMahasiswa)
            {
                $matbar[$id_mahasiswa][$id_kriteria] = pow($perMahasiswa[$id_kriteria],2);
                $sumCol[$id_kriteria] = $sumCol[$id_kriteria] + $matbar[$id_mahasiswa][$id_kriteria];
            }
            $sumCol[$id_kriteria]=sqrt($sumCol[$id_kriteria]);
        }

        return $sumCol;//array sumColumnsBerpangkat per Column
    }


    // public function sumPerColumnsBerpangkatDiakarkanTanpaKolomTerakhir($matriks){
    //     $sumCol=[];
    //     for( $kolom = 0; $kolom < count($matriks[0])-1; $kolom++){//-1, kolom terakhir diabaikan
    //         $sumCol[$kolom]=0;
    //         for( $baris = 0; $baris < count($matriks); $baris++){
    //             $matriks[$baris][$kolom]=pow($matriks[$baris][$kolom],2);
    //             $sumCol[$kolom]=$sumCol[$kolom]+$matriks[$baris][$kolom];
    //         }
    //         $sumCol[$kolom]=sqrt($sumCol[$kolom]);
    //     }
    //     return $sumCol;//array sumColumnsBerpangkat per Column
    // }







    public function sumPerRowsDiakarkanTanpaKolomTerakhir($matriks)
    {
        foreach ($matriks as $id_mahasiswa => $perMahasiswa)
        {
            $sumRow[$id_mahasiswa]=0;
            foreach ($perMahasiswa as $id_kriteria => $value)
            {
                $sumRow[$id_mahasiswa]=$sumRow[$id_mahasiswa]+$value;
            }
            $sumRow[$id_mahasiswa]=sqrt($sumRow[$id_mahasiswa]);
        }

        return $sumRow;//array sumRowsBerpangkat per Row
    }



    // public function sumPerRowsDiakarkanTanpaKolomTerakhir($matriks){
    //     for( $baris = 0; $baris < count($matriks); $baris++){
    //         $sumRow[$baris]=0;
    //         for( $kolom = 0; $kolom < count($matriks[0])-1; $kolom++){
    //             $sumRow[$baris]=$sumRow[$baris]+$matriks[$baris][$kolom];
    //         }
    //         $sumRow[$baris]=sqrt($sumRow[$baris]);
    //     }
    //     return $sumRow;//array sumRowsBerpangkat per Row
    // }










    public function kriteriaMaxMin($matriksWeightedTopsis,$kriteria){



        foreach ($kriteria as $id_kriteria => $value)
        {
            $matriksPerCol=[];
            foreach ($matriksWeightedTopsis as $id_mahasiswa => $perMahasiswa)
            {
                $matriksPerCol[]=$perMahasiswa[$id_kriteria];
            }
            $maxMin[$id_kriteria]['max']=max($matriksPerCol);
            $maxMin[$id_kriteria]['min']=min($matriksPerCol);
        }

        return $maxMin;//array sumColumnsBerpangkat per Column
    }


    // public function kriteriaMaxMin($matriksWeightedTopsis){
    //     for( $kolom = 0; $kolom < count($matriksWeightedTopsis[0])-1; $kolom++){//-1, kolom terakhir diabaikan
    //         $matriksPerCol=[];
    //         for( $baris = 0; $baris < count($matriksWeightedTopsis); $baris++){
    //             $matriksPerCol[]=$matriksWeightedTopsis[$baris][$kolom];
    //         }
    //         $maxMin[$kolom]['max']=max($matriksPerCol);
    //         $maxMin[$kolom]['min']=min($matriksPerCol);
    //     }
    //     return $maxMin;//array per Kriteria
    // }







    public function matriksSolusiIdeal($maxmin,$kriteria){


        foreach ($maxmin as $id_kriteria => $value)
        {
            if ($kriteria->$id_kriteria->jenis=="benefit")
            {
                $solusiIdeal[$id_kriteria]['jenis']="benefit";
                $solusiIdeal[$id_kriteria]['positif']=$value['max'];
                $solusiIdeal[$id_kriteria]['negatif']=$value['min'];
            }
            elseif ($kriteria->$id_kriteria->jenis=="cost")
            {
                $solusiIdeal[$id_kriteria]['jenis']="cost";
                $solusiIdeal[$id_kriteria]['positif']=$value['min'];
                $solusiIdeal[$id_kriteria]['negatif']=$value['max'];
            }

        }
        return $solusiIdeal;//array per Kriteria
    }

    // public function matriksSolusiIdeal($maxmin,$jenis){
    //     for ($i=0; $i < count($maxmin); $i++)
    //     {
    //         if ($jenis[$i]=="Benefit") {
    //             $solusiIdeal[$i]['jenis']=$jenis[$i];
    //             $solusiIdeal[$i]['positif']=$maxmin[$i]['max'];
    //             $solusiIdeal[$i]['negatif']=$maxmin[$i]['min'];
    //         }
    //         elseif($jenis[$i]=="Cost")
    //         {
    //             $solusiIdeal[$i]['jenis']=$jenis[$i];
    //             $solusiIdeal[$i]['positif']=$maxmin[$i]['min'];
    //             $solusiIdeal[$i]['negatif']=$maxmin[$i]['max'];
    //         }
    //     }
    //     return $solusiIdeal;//array per Kriteria
    // }







    public function distance($matriksWeighted,$solusiIdeal,$psOrNg){

        foreach ($matriksWeighted as $id_mahasiswa => $perMahasiswa)
        {
            foreach ($perMahasiswa as $id_kriteria => $value)
            {
                $return[$id_mahasiswa][$id_kriteria] =
                pow($value-$solusiIdeal[$id_kriteria][$psOrNg],2);
            }
        }

        $hasil=$this->sumPerRowsDiakarkanTanpaKolomTerakhir($return);
        return $hasil;//ARRAY per baris

    }

    // public function distance($weighted,$solusiIdeal,$psOrNg){
    //     for($baris = 0; $baris < count($weighted); $baris++)
    //     {
    //         for($kolom = 0; $kolom < count($weighted[$baris])-1; $kolom++)//-1, kolom terakhir diabaikan
    //         {
    //             $weighted[$baris][$kolom] = pow($weighted[$baris][$kolom]-$solusiIdeal[$kolom][$psOrNg],2);
    //         }
    //     }

    //     $hasil=$this->sumPerRowsDiakarkanTanpaKolomTerakhir($weighted);

    //     return $hasil;//ARRAY per baris
    // }










    public function nilaiPreferensi($dPositif,$dNegatif,$matriksWeighted){

        foreach ($matriksWeighted as $id_mahasiswa => $perMahasiswa)
        {
            /*
            JIKA dPositif + dNegatif == 0, maka kembalikan.
            karena itu hanya akan terjadi jika semua nilai pada semua matriks sama.
            alias setara semua sehingga tidak bisa diranking.
            contoh {[2,2,2,],[2,2,2,],[2,2,2]}
            */
            if($dPositif[$id_mahasiswa]+$dNegatif[$id_mahasiswa]==0)
            {
                return "setara";
            }

            $hasil[$id_mahasiswa]['nilai']=
            $dNegatif[$id_mahasiswa]/
            ($dPositif[$id_mahasiswa]+$dNegatif[$id_mahasiswa]);
        }
        return $hasil;//ARRAY per baris
    }


    // public function nilaiPreferensi($dPositif,$dNegatif,$matriksUntukAmbilID){
    //     for($baris = 0; $baris < count($dPositif); $baris++)
    //     {
    //         $id=$matriksUntukAmbilID[$baris][count($matriksUntukAmbilID[0])-1];//ambil ID
    //         $hasil[$id]['nilai']=$dNegatif[$baris]/($dPositif[$baris]+$dNegatif[$baris]);
    //         // $hasil[$baris]['id']=$matriksUntukAmbilID[$baris][count($matriksUntukAmbilID[0])-1];
    //     }
    //     return $hasil;//ARRAY per baris
    // }







}