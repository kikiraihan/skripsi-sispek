<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saudara extends Model
{

    protected $fillable=[
        'id_mahasiswa',
        'nama',
        'pendidikan_terakhir',
        'bekerja',
        'hubungan',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo('App\Models\Mahasiswa');
    }

    public function getBekerjakahAttribute($value)
    {
        if ($value)
            return "bekerja";

        return "tidak bekerja";

    }
}
