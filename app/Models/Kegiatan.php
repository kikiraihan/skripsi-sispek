<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable=[
        'id_mahasiswa',
        'sertifikat',
        'judul',
        'tanggal',
        'lokasi',
        'penyelenggara',
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
