<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ipksebelumnya extends Model
{
    protected $fillable=[
        'id_mahasiswa',
        'ipk',
    ];


    public function mahasiswa()
    {
        return $this->belongsTo('App\Models\Mahasiswa');
    }
}
