<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');//meio para verificar se o usuario esta logado ou nao
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}


/*
Middlewares: Dentro de aplicacoes web, ele é um codigo ou programa que é executado entre
a requisição(request) e a minha aplicacao (é a logica executada pelo acesso a uma determinada rota)


Request ->  Middleware -> Aplicação (Acesso qualquer rota) <- Marketplace
app http middleware (caminho no vscode)
*/