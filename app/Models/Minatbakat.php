<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Minatbakat extends Model
{
    protected $fillable=[
        'id_mahasiswa',
        'title',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo('App\Models\Mahasiswa');
    }
}
