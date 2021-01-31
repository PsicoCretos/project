<?php
use App\Traits\UploadTrait;
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\ProductRequest;
use App\Traits\UploadTrait;

class ProductController extends Controller
{
    use UploadTrait;

    private $product;    //internamente quando ele fizer new ProductController ele auto faz (new Product()) q é o meu model

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //listar os dados
    {
        $userStore= auth()->user()->store;
        $products = $userStore->products()->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // exibir formulario de criacao 
    {
        $categories = \App\Category::all(['id','name']);

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request) //processamento da criacao
    {               
        $data = $request->all();

        $store = auth()->user()->store; //HasOne
        $product = $store->products()->create($data);

        $product->categories()->sync($data['categories']);

        if($request->hasFile('photos')) {
            $images = $this->imageUpload($request->file('photos', 'image'));    //insercao das imagens / referencia na base nome da img so com a pasta
            
            $product->photos()->createMany($images);
        }
        flash('Produto Criado Com Sucesso!')->success();
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) // visualizacao rapida de um dado
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($product) //exibir formulario de edicao
    {
        $product = $this->product->findOrFail($product);
        $categories = \App\Category::all(['id','name']);


        return view('admin.products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $product) //processamento da atualizacao
    {
        $data = $request->all();

        $product = $this->product->find($product);
        $product->update($data);
        $product->categories()->sync($data['categories']);

        if($request->hasFile('photos')) {
            $images = $this->imageUpload($request->file('photos'), 'image');            //insercao das imagens / referencia na base nome da img so com a pasta
            
            $product->photos()->createMany($images);
        }

        flash('Produto Atualizado Com Sucesso!')->success();
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product) //remover
    {
        $product = $this->product->find($product);
        $product->delete();

        flash('Produto Removido Com Sucesso!')->success();
        
        return redirect()->route('admin.products.index');
    }
}
