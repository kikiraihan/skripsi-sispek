<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,HasRoles;
    protected $guard_name="web";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //relation
    public function mahasiswa()
    {
        return $this->hasOne('App\Models\Mahasiswa', 'id_user');
    }


    public function getGravatarAttribute(){

        // asset('assets_landing/img/avatar_2x.png')

        // gravatar
        $hash=md5( strtolower( trim( $this->email ) ) );

        $gravatar="https://www.gravatar.com/avatar/".$hash.".png?d=robohash&s=200&r=pg";//&d=404,d=mp,d=retro,d=monsterid,d=wavatar,d=robohash

        return $gravatar!=NULL?$gravatar:asset('assets_landing/img/avatar_2x.png');
    }


}
