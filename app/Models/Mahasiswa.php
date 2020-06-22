<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon as BaseCarbon;

class Mahasiswa extends Model
{
    protected $fillable=[
        'id_user',
        'nama',
        'nim',
        'angkatan',
        'prodi',
        'tgl_lahir',
        'tempat_lahir',
        'jenis_kelamin',
        'golongan_darah',
        'agama',
        'status_menikah',
        'asuransi',
        'no_ktp',
        'no_hp',
        'ipk_sebelumnya',
    ];

    //cara ambil tanggal bahasa indonesia
    // $undangan->tgl->formatLocalized("%A, %d %B %Y")

    protected $dates = [
        'tgl_lahir',
    ];


    // atribut buatan
    public function getStatusAttribute($value)
    {
        if ($this->status_menikah==0)
        return "belum menikah";

        return "sudah menikah";
    }

    public function getUsiaAttribute($value)
    {
        if ($this->tgl_lahir==NULL)
        return "-";

        return $this->tgl_lahir->age;
    }

    public function getSksLulusAttribute($value)
    {
        return $this->matakuliah()
        ->wherePivotNotIn('nilai_mutu', [
            "C-","D+", 'D',
            "D-","E+", 'E',
            ''
            ])
        ->get()->sum('sks');
    }

    public function getSksKecualiNULLAttribute($value)
    {
        return $this->matakuliah()
        ->wherePivotNotIn('nilai_mutu', [''])
        ->get()->sum('sks');
    }

    public function getSksAllAttribute($value)
    {
        return $this->matakuliah()->get()->sum('sks');
    }

    public function getMkKosongAttribute($value)
    {
        return $this->matakuliah()
        ->wherePivot('nilai_mutu', '')
        ->count();
    }

    public function getMkMengulangAttribute($value)
    {
        return $this->matakuliah()
        ->wherePivotIn('nilai_mutu',[
            "C-","D+", 'D',
            "D-","E+", 'E',
        ])
        ->count();
    }

    public function getNilaiAAttribute($value)
    {
        return $this->matakuliah()
        ->wherePivotIn('nilai_mutu',[
            'A','A-'
            ])
        ->count();
    }

    public function getNilaiBAttribute($value)
    {
        return $this->matakuliah()
        ->wherePivotIn('nilai_mutu',[
            'B','B-','B+'
            ])
        ->count();
    }

    public function getNilaiCAttribute($value)
    {
        return $this->matakuliah()
        ->wherePivotIn('nilai_mutu',[
            'C','C+'
            ])
        ->count();
    }

    public function getIpkSekarangAttribute($value)
    {
        //matakuliah()->get()[0]->pivot->angka_mutu
        //matakuliah()->get()[0]->pivot->nilai_mutu
        //$this->matakuliah()->get()[0]->sks;

        //matakuliah()->get()[0]->pivot->semester
        //$this->matakuliah()->get()[0]->kodemk;
        //$this->matakuliah()->get()[0]->nama;
        //$this->matakuliah()->get()[0]->rumpun;

        $bobot=0;
        $lulus=$this->matakuliah()->wherePivotNotIn('nilai_mutu', [
                "C-","D+", 'D',
                "D-","E+", 'E',''
            ])->get();

        foreach($lulus as $l)
        {
            $bobot+=$l->pivot->angka_mutu*$l->sks;
        }

        $hasil=$bobot/($this->skskecualiNULL);
        return number_format((float)$hasil, 2, '.', '');
        // return $bobot;
    }











    //relation
    public function user()
    {
        return $this->belongsTo('App\Model\User', 'id_user');
    }

    public function minatbakat()
    {
        return $this->hasMany('App\Models\Minatbakat', 'id_mahasiswa');
    }

    public function lokasi()
    {
        return $this->hasMany('App\Models\Lokasi', 'id_mahasiswa');
    }

    public function saudara()
    {
        return $this->hasMany('App\Models\Saudara', 'id_mahasiswa');
    }

    public function orangtua()
    {
        return $this->hasMany('App\Models\Orangtua', 'id_mahasiswa');
    }

    public function kegiatan()
    {
        return $this->hasMany('App\Models\Kegiatan', 'id_mahasiswa');
    }

    public function prestasi()
    {
        return $this->hasMany('App\Models\Prestasi', 'id_mahasiswa');
    }

    public function transkrip()
    {
        return $this->hasMany('App\Models\Transkrip', 'id_mahasiswa');
    }

    public function organisasi()
    {
        return $this->belongsToMany('App\Models\Ormawa', 'anggota_ormawa', 'id_mahasiswa', 'id_ormawa')->withPivot('periode_dari','periode_sampai');//,'suratbuktianggota','status'
    }

    public function status_mahasiswa()
    {
        return $this->belongsToMany('App\Models\Tahunakademik', 'status_mahasiswa', 'id_mahasiswa', 'id_tahunakademik');
    }

    public function matakuliah()
    {
        return $this->belongsToMany('App\Models\Matakuliah', 'kontrak_matakuliah', 'id_mahasiswa', 'id_matakuliah')->withPivot('angka_mutu','nilai_mutu','semester');
    }





}
