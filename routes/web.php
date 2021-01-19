<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $helloWorld = 'ola mundao!';

    return view('welcome',compact('helloWorld'));
})->name('home');

Route::get('/model', function(){

   // $products = \App\Product::all(); //select * tudo from products.. se eu tenho o model "Product" laravel sempre vai procurar no plural.. no caso products
   // $user = new \App\User();  //para criar dados para ser salvo nas tabelas
   // $user = \App\User::find(1);// atualiza o usuario.. chamando estancia nova. chamando por find vc edita atualiza as informacoes
   //  $user->name = 'Usuario Teste';
   //  $user->email = 'email@teste.com';
   // $user->password = bcrypt('12345678') ;
   //  $user->save(); //active record.. criar do zero passar instancia vazia e definir.
   
   //\App\User::all(); //retorna tudo todos os usuarios atualizado;Collection q o laravel pega retornodo eloquent automaticamente
   //\App\User::find(3); //retorna o unico usuario com base no id dele
   //\App\User::where('name','Crish')->get(); //select *from users onde nome = 'Crish.. get pra retornar uma selecao.. ou first para ser o primeiro em vez de get
   // \App\User::where('name','Crish')->first(); //ou first para ser o primeiro resultado q vier em vez de get
    //\App\User::paginate(10); //paginar dados com laravel retornando json
    
                //Mass Assigment ou Atribuiçao em massa ...
    // $user = \App\User::create([
    //     'name' => 'Marcelo pia brabo',
    //     'email' => 'email@brabo.com',
    //     'password' => bcrypt('123345566')
    // ]);         //Mass Update
//     $user = \App\User::find(82);
//     $user->update([
//         'name' => 'pia brabo mass update',
//         'email' => 'piabrabo@brabo.com',
//         'password' => 'senhabraba'        
//     ]);            //true ou false dado ao erro da atualizacao
//dd($user);//para ver o resultado 
//como pegar a loja de um usuario
//$user = \App\User::find(4);
//return $user->store; dd($user->store()); quando chamar por propriedade se for 1 pra 1 ele retorna o objeto unico. no caso (Store) se for N:N ele retorna collection de dados(objetos)automatico ; chamando como metodo no caso dd retorna uma instancia de hasone ou instancia q representa essa ligacao , da pra fazer (count) conta quantas lojas tem. 

//Pegar produtos de uma loja
//$loja = \App\Store::find(1);
//return $loja->products->count()//retorno em json collection,, da pra fazer count
//return $loja->products()->where('id',1)->get();//pra buscar somente da relacao produto id 1 ou so ate products(); pra retornar tudo. do tipo hasmany
//pegar as lojas de uma categoria de uma loja
// $categoria = \App\Category::find(1);
// $caterogia->products;   n:n


//Criar ma loja para um usuario
// $user = \App\User::find(10);
// $store = $user->store()->create([
//     'name' => 'Loja teste',
//     'description' => 'loja teste de produtos de informatica',
//     'mobile_phone' => 'XX-XXXXX-XXXX',
//     'phone' => 'XX-XXXX-XXXX',
//     'slug' => 'loja-teste'
// ]); dd($store); pra ver o resultado

//Criar um produto para uma loja
// $store = \App\Store::find(1);
// $product = $store->products()->create([
//     'name' => 'Notebook acer ',
//         'description' => 'core i7 16 GB',
//         'body' => 'Qualquercoisa link www.qualquercoisa.com.br',
//         'price' => 4999.90,
//         'slug' => 'notebook-acer',
// ]);

// dd($product);

//Criar uma categoria

// \App\Category::create([
//     'name' => 'Games',
//     'slug' => 'games'
// ]);

// \App\Category::create([
//     'name' => 'Notebooks',
//     'slug' => 'notebooks'
// ]);

// return \App\Category::all();

//Adicionar produto para uma categoria ou vice versa

    // $product = \App\Product::find(1);

    // dd($product->categories()->sync([2]));// adicionar com attach ou remover com detach, retorna a quantia de itens removidos de n:n , sync :se n tem nada ele adiciona todos os itens q tem no aray q é passado pra ele.. deve ter id q existe na tabela q eu to associando.. se no caso ele tinha 1,2 adicionou as 2 categorias se colocar so 2 ele mantem a 2 e remove a categoria 1, pode usar sync na criacao de produto e na edicao mto mais simplificado

    $product = \App\Product::find(1);

    return $product->categories;//ate product ve os protudos, categories pra ver a categoria dentro de produtos
});
Route::group(['middleware' => ['auth']], function(){

    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){

        // Route::prefix('stores')->name('stores.')->group(function(){
        
        //     Route::get('/','StoreController@index')->name('index'); //exibir todas as lojas
        //     Route::get('/create','StoreController@create')->name('create'); // formulario criar loja
        //     Route::post('/store','StoreController@store')->name('store'); // salvar loja de fato
        //     Route::get('/{store}/edit','StoreController@edit')->name('edit');
        //     Route::post('/update/{store}','StoreController@update')->name('update');
        //     Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');
        
        // });
            Route::resource('stores', 'StoreController');
            Route::resource('products', 'ProductController'); 
            Route::resource('categories', 'CategoryController');

        });

});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');//->middleware('auth'); tbm da pra chamar para rota que eu quiser controla se usuario esta autenticado ou nao no caso desse middleware






//Route::get - recupera as coisas
//Route::post - cria alguma coisa
//Route::put - atualizacao 
//Route::patch - atualizacao 
//Route::delete - deleta algo
//Route::options - dentro do http ele me retorna quais cabecalhos a rota especifica me responde, mas tem q implementar isso

