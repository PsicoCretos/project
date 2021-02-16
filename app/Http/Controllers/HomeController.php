<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    private $product;    //internamente quando ele fizer new ProductController ele auto faz (new Product()) q é o meu model

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->limit(9)->orderBy('id', 'DESC')->get();

        return view('welcome',compact('products'));
    }

    public function single($slug)
    {
        $product = $this->product->whereSlug($slug)->first();

        return view('single', compact('product'));
    }
}