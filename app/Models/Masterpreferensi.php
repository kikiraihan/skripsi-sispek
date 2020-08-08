<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masterpreferensi extends Model
{
    protected $fillable=[

        'id_user',
        'catatan',

        'judul',
        'model_type',
        'ordo',
        'matriks',
        'matriksNormalised',
        'kriteria',
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }


}
