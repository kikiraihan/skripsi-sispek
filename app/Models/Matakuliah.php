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
        'rumpun',
    ];

    public function mahasiswa()
    {
        return $this->belongsToMany('App\Models\Mahasiswa', 'kontrak_matakuliah', 'id_matakuliah', 'id_mahasiswa')->withPivot('angka_mutu','nilai_mutu','semester');
    }

}
