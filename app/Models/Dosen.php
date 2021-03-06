<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable=[
        'id_user',
        'nama',
        'nip',
    ];

    //relation
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function kaprodi()
    {
        return $this->hasOne('App\Models\Kaprodi', 'id_dosen');
    }

    public function kajur()
    {
        return $this->hasOne('App\Models\Kajur', 'id_dosen');
    }

    public function mahasiswapa()
    {
        return $this->hasMany('App\Models\Mahasiswa', 'id_dosen_pa');
    }


}
