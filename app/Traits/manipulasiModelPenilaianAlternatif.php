<?php

namespace App\Traits;

trait manipulasiModelPenilaianAlternatif
{

    public function nilaiSebenarnyaPerTitle($penilaianPerMahasiswaPerPenilai,$title)
    {
        $isiNilai=0;
        foreach($penilaianPerMahasiswaPerPenilai as $penilai)
        {
            $isiNilai=$isiNilai+$penilai->nilai->$title;
        }
        // dd($isiNilai/count($penilaianPerMahasiswaPerPenilai));
        return $isiNilai/count($penilaianPerMahasiswaPerPenilai);
    }

    public function decodeAllJsonNilai($preference)
    {
        $preference->penilaianAlternatif->each(function($pa)
        {
            $pa->nilai=json_decode($pa->nilai);
        });
    }

}