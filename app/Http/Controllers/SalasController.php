<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidades;
use App\Models\Salas;
use App\Models\PreReserva;
use App\Models\Reservas;
use Auth;
use DateTime;
class SalasController extends Controller
{
    //Salas
    public function BuscaSala(){
        $unidades = Unidades::where('id', '>', 0)->with('salas')->get();
       
        return view('clientes.salas', [
            'unidades' => $unidades,
        ]);
    }


    public function VerSala($id){
       $sala = Salas::where('id', $id)->with('facilidades')->with('fotos')->with('unidades')->first();
      
        return view('clientes.salas.ver-salas', [
            'sala' => $sala,
        ]);
    }
    //Pré Reservas
    public function PreReservarSala(Request $request){
        
        $sala = Salas::where('id', $request->id_sala)->first();
        $inicio = new DateTime($request->hora_inicio);
        $fim = new DateTime($request->hora_fim);
        $intervalo = $inicio->diff($fim);
      
        if($intervalo->i == 0){
        $multiplicador_valor = $intervalo->h;
        }else{
            $multiplicador_valor = $intervalo->h + 0.5;
        }
        $valor = $sala->valor * $multiplicador_valor;
        
        $preReserva = new PreReserva();
        $preReserva->id_user = Auth::user()->id;
        $preReserva->id_sala = $sala->id;
        $preReserva->data = $request->data;
        $preReserva->hora_inicio = $request->hora_inicio;
        $preReserva->hora_fim = $request->hora_fim;
        $preReserva->status = 'Aguardando Pagamento';
        $preReserva->valor = $valor;
        $preReserva->save();
         return redirect()->route('cliente-VerPreReserva', ['id' =>$preReserva->id]);
     }

     public function VerPreReserva($id){

        $preReserva = PreReserva::where('id', $id)->with('sala')->first();
        $inicio = new DateTime($preReserva->hora_inicio);
        $fim = new DateTime($preReserva->hora_fim);
        $intervalo = $inicio->diff($fim);
        $tempo = $intervalo->h.':'.$intervalo->i;
        if($intervalo->i == 0){
            $multiplicador_valor = $intervalo->h;
            }else{
                $multiplicador_valor = $intervalo->h + 0.5;
            }
            $valor = $preReserva->sala->valor * $multiplicador_valor;
        return view('clientes.salas.ver-pre-reserva',[
            'preReserva' => $preReserva,
            'valor' => $valor,
            'tempo' => $tempo,
        ]);
     }

     //Reservas
     public function ReservarSala(Request $request){
  
         $reserva = new Reservas();
         $reserva->id_user = Auth::user()->id;
         $reserva->id_sala = $request->id_sala;
         $reserva->id_pre_reserva = $request->id_pre_reserva;
         $reserva->meio_de_pagamento = $request->payment_method;
         $reserva->status_pagamento = 'Aguardando Pagamento';
         $reserva->status_reserva = 'Agendado';
         $reserva->save();

         return redirect()->route('cliente-VerReserva', ['id' =>$reserva->id]);
     }

     
     public function VerReserva($id){

        $reserva = Reservas::where('id', $id)->first();
        $preReserva = PreReserva::where('id', $reserva->id_pre_reserva)->with('sala')->first();
        $inicio = new DateTime($preReserva->hora_inicio);
        $fim = new DateTime($preReserva->hora_fim);
        $intervalo = $inicio->diff($fim);
        $tempo = $intervalo->h.':'.$intervalo->i;
        if($intervalo->i == 0){
            $multiplicador_valor = $intervalo->h;
            }else{
                $multiplicador_valor = $intervalo->h + 0.5;
            }
            $valor = $preReserva->sala->valor * $multiplicador_valor;
        return view('clientes.salas.ver-reserva',[
            'reserva' => $reserva,
            'preReserva' => $preReserva,
            'valor' => $valor,
            'tempo' => $tempo,
        ]);
     }

     public function MinhasReservas(){
        
        $reservas = Reservas::where('id_user', Auth::user()->id)->with('preReserva')->get();
        
        return view('clientes.reservas.minhas-reservas', [
            'reservas' => $reservas,
        ]);
    }

}
