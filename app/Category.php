<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasSlug;
    
    protected $fillable = ['name','description','slug'];

      /**
        * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class);//',products_categories como segundo parametro dps de class se o caso fosse esse //toda vez q fazer busca em cima dessas inserçoe so laravel procura na ordem alfabetica no caso C antes do P : category_product
    }
}
