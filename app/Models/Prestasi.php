<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $fillable=[
        'id_mahasiswa',
        'sertifikat',
        'judul',
        'tanggal',
        'tingkat',
        'peringkat',
        'lokasi',
        'kategori',
        'status'
    ];

    protected $dates = [
        'tanggal',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo('App\Models\Mahasiswa');
    }
}
