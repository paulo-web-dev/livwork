<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidades;
class SalasAdmController extends Controller
{
    public function form(){
     
        $unidades = Unidades::all();
        return view('adm.salas.form', [
            'unidades' => $unidades,
        ]);
    }
}
