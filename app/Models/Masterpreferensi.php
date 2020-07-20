<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masterpreferensi extends Model
{
    protected $fillable=[
        'model_type',
        'judul',
        'ordo',
        'matriks',
        'matriksNormalised',
        'kriteria',
    ];


}
