<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','description','slug'];

    public function products()
    {
        return $this->belongsToMany(Product::class);//',products_categories como segundo parametro dps de class se o caso fosse esse //toda vez q fazer busca em cima dessas inserçoe so laravel procura na ordem alfabetica no caso C antes do P : category_product
    }
}
