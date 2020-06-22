<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $fillable=[
        'id_mahasiswa',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'alamat_deskripsi',
        'kodepos',
        'jenis',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo('App\Models\Mahasiswa');
    }

}
