<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['name','description','phone','mobile_phone','slug'];

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

//Store - nome do model... ele procura no plural la no banco de dados.. no caso stores, 
//stores

//Product -> products
//protected $table = 'tb_lojas'; quando n for no plural.. no nome q quiser.. 
