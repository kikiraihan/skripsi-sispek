<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transkrip extends Model
{
    protected $fillable=[
        'id_mahasiswa',
        'file',
        'catatan',
        'status',
    ];


    public function mahasiswa()
    {
        return $this->belongsTo('App\Models\Mahasiswa');
    }

}
