<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $fillable=[
        'nama',
        'sks',
        'semester',
        'kodemk',
        'prodi',
        'rumpun',
    ];


    public function getMahasiswaMengulangAttribute($value)
    {
        return $this->mahasiswa()
        ->wherePivotIn('nilai_mutu',[
            "C-","D+", 'D',
            "D-","E+", 'E',
        ])
        ->count();
    }


    // relation
    public function mahasiswa()
    {
        return $this->belongsToMany('App\Models\Mahasiswa', 'kontrak_matakuliah', 'id_matakuliah', 'id_mahasiswa')->withPivot('angka_mutu','nilai_mutu','semester');
    }

    public function mahasiswanilaie()
    {
        return $this->belongsToMany('App\Models\Mahasiswa', 'kontrak_matakuliah', 'id_matakuliah', 'id_mahasiswa')->wherePivotIn('nilai_mutu', ['C-','D+','D','D-','E']);
    }
}
