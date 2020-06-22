<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
    protected $fillable=[
        'id_mahasiswa',
        'nama',
        'pekerjaan',
        'kategori_pekerjaan',
        'no_hp',
        'pendidikan_terakhir',
        'kategori_penghasilan',
        'nominal_penghasilan',
        'hubungan',
    ];


    public function mahasiswa()
    {
        return $this->belongsTo('App\Models\Mahasiswa');
    }

}
