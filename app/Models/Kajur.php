<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kajur extends Model
{
    protected $fillable=
    [
        'id_dosen',
        'jurusan',
        'periode'
    ];

    //relation
    public function dosen()
    {
        return $this->belongsTo('App\Models\Dosen', 'id_dosen');
    }
}
