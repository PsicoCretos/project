<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**,'created_at','updated_at','email_verified_at'
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        //'name' => 'boolean' //toda vez q eu usar esse name ele seja convertido auto para booleano com os models toda hora q fazer busca. integer,float (CASTS)
    ];
    public function store()
    {
        return $this->hasOne(Store::class);//,'usuario_id'//na tabela store coloquei usuario_id, só informar no segundo parametro
    }
}


//1:1 - um pra um (entre usuario e loja) hasOne usuario tem 1 loja, e a loja pertence ao usuario belongsTo
//1:N - um pra muitos(entre loja e produtos) | hasMany e belongsTo - no caso hasMany na loja pq ela q tem mtos produtos e protudos belongsTo pq produto pertence a loja
//N:N - muitos pra muitos (entre categorias e produtos)- tabela intermediaria pra representat n:n | belongsToMany