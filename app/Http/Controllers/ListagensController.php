<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\Unidades;
use App\Models\Salas;
use App\Models\Reservas;

class ListagensController extends Controller
{
    public function clientes(){

        $clientes = Clientes::all();
        return view('adm.listagem.clientes',[
            'clientes' => $clientes,
        ]);
    }

    public function unidades(){

        $unidades = Unidades::all();
        return view('adm.listagem.unidades',[
            'unidades' => $unidades,
        ]);
    }

    public function salas(){

        $salas = Salas::where('id', '>', 0)
        ->with('unidades')
        ->with('fotos')
        ->with('facilidades')
        ->with('configuracao')
        ->with('horarios')
        ->get();
        return view('adm.listagem.salas',[
            'salas' => $salas,
        ]);
    }

    public function reservas(){

        $reservas = Reservas::where('id', '>', 0)->with('preReserva')->get();
        
        return view('adm.listagem.reservas',[
            'reservas' => $reservas,
        ]);
    }
}
