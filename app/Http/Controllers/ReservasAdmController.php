<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\Unidades;
use App\Models\Salas;
use App\Models\PreReserva;
use App\Models\Reservas;
use DateTime;
class ReservasAdmController extends Controller
{
    public function ReservarCliente($cliente){
        
        $cliente = Clientes::where('id', $cliente)->first();
        $unidades = Unidades::where('id', '>', 0)->with('salas')->get();
        return view('adm.reservas.cadastrar', [
                'cliente' => $cliente,
                'unidades' => $unidades,
        ]);
    }

    public function ReservaInfo($id){
        
        
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

        $unidades = Unidades::where('id', '>', 0)->with('salas')->get();
   
        return view('adm.reservas.info', [
            'reserva' => $reserva,
            'preReserva' => $preReserva,
            'valor' => $valor,
            'tempo' => $tempo,
                'unidades' => $unidades,
        ]);
    }

    public function ReservarSala(Request $request){
            
        $sala = Salas::where('id', $request->sala)->first();
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
        $preReserva->id_user = $request->user;
        $preReserva->id_sala = $sala->id;
        $preReserva->data = $request->data;
        $preReserva->hora_inicio = $request->hora_inicio;
        $preReserva->hora_fim = $request->hora_fim;
        $preReserva->status = 'Aguardando Pagamento';
        $preReserva->valor = $valor;
        $preReserva->save();

        $reserva = new Reservas();
        $reserva->id_user = $request->user;
        $reserva->id_sala = $sala->id;
        $reserva->id_pre_reserva = $preReserva->id;
        $reserva->meio_de_pagamento = 'Próxima Fatura';
        $reserva->status_pagamento = 'Aguardando Pagamento';
        $reserva->status_reserva = 'Agendado';
        $reserva->save();

        return redirect()->route('adm-listar-reservas');

    }

    
    public function AtualizarReservarSala(Request $request){
            
        $sala = Salas::where('id', $request->sala)->first();
        $inicio = new DateTime($request->hora_inicio);
        $fim = new DateTime($request->hora_fim);
        $intervalo = $inicio->diff($fim);
      
        if($intervalo->i == 0){
        $multiplicador_valor = $intervalo->h;
        }else{
            $multiplicador_valor = $intervalo->h + 0.5;
        }
        $valor = $sala->valor * $multiplicador_valor;
        
        $preReserva =  PreReserva::where('id', $request->id_pre)->first();
        $preReserva->id_user = $request->user;
        $preReserva->id_sala = $sala->id;
        $preReserva->data = $request->data;
        $preReserva->hora_inicio = $request->hora_inicio;
        $preReserva->hora_fim = $request->hora_fim;
        $preReserva->status = 'Aguardando Pagamento';
        $preReserva->valor = $valor;
        $preReserva->save();

        $reserva = Reservas::where('id', $request->idr)->first();
        $reserva->id_user = $request->user;
        $reserva->id_sala = $sala->id;
        $reserva->id_pre_reserva = $preReserva->id;
        $reserva->meio_de_pagamento = 'Próxima Fatura';
        $reserva->status_pagamento = 'Aguardando Pagamento';
        $reserva->status_reserva = 'Agendado';
        $reserva->save();

        return redirect()->route('adm-listar-reservas');

    }
}
   