<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ormawa extends Model
{
    //
    protected $fillable=[
        'nama',
        'binaan',
        'deskripsi',
        'website',
        'jenis',
        'kategori',
    ];


    public function anggota()
    {
        return $this->belongsToMany('App\Models\Mahasiswa', 'anggota_ormawa', 'id_ormawa', 'id_mahasiswa')->withPivot('periode_dari','periode_sampai');//,'suratbuktianggota','status'
    }


}
