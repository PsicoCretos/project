<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        if(!auth()->check()){
            return redirect()->route('login');
        }

        dd($this->makePagSeguroSession());

        return view('checkout');
    }

    private function makePagSeguroSession()
    {
        $sessionCode = \PagSeguro\Services\Session::create(
            \PagSeguro\Configuration\Configure::getAccountCredentials()
        );

        return $sessionCode->getResult();
    }
}
