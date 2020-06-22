<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tahunakademik extends Model
{
    protected $fillable=[
        'tahun_akademik',
        'semester',
        'status_aktif',
    ];


    public function mahasiswa()
    {
        return $this->belongsToMany('App\Models\Mahasiswa', 'status_mahasiswa', 'id_tahunakademik', 'id_mahasiswa');
    }


}
