<?php

namespace App\Http\Controllers\Clientes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    public function home(){

        if(Auth::user()->power == 1){
           return redirect()->route('adm-home');
        }
       
        return view('clientes.home');
    }

    public function logout()
    { 
        
        Auth::logout() ; 
        return redirect()->route('cliente-home');              
        
    }
}
