<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salas;
use App\Models\PreReserva;
use DateTime;

class ApiController extends Controller
{
    public function BuscaHorarios(Request $request)
    {
        // Busca as pré-reservas da sala para a data selecionada
        $preReservas = PreReserva::where('id_sala', $request->id_sala)
            ->where('data', $request->data)
            ->get();
    
        // Busca a sala e seus horários
        $sala = Salas::where('id', $request->id_sala)->with('horarios')->first();
    
        if (!$sala || !$sala->horarios) {
            return response()->json(['error' => 'Sala ou horários não encontrados'], 404);
        }
    
        // Converte os horários da sala em objetos DateTime
        $inicio = new DateTime($sala->horarios->inicio_padrao);
        $fim = new DateTime($sala->horarios->fim_padrao);
    
        $horarios_inicio = [];
        $horarios_fim = [];
    
        // Armazena horários ocupados (de hora_inicio até hora_fim + margem de 30 minutos)
        $horarios_ocupados = [];
    
        foreach ($preReservas as $reserva) {
            $horaInicioReserva = new DateTime($reserva->hora_inicio);
            $horaFimReserva = new DateTime($reserva->hora_fim);
    
            // Adiciona margem de 30 minutos antes e depois da reserva
            $horaInicioReserva->modify('-30 minutes'); // Margem antes
            $horaFimReserva->modify('+30 minutes'); // Margem depois
    
            while ($horaInicioReserva < $horaFimReserva) {
                $horarios_ocupados[] = $horaInicioReserva->format('H:i');
                $horaInicioReserva->modify('+30 minutes');
            }
        }
    
        while ($inicio < $fim) {
            $hora_formatada = $inicio->format('H:i');
    
            // Apenas adiciona se o horário não estiver reservado
            if (!in_array($hora_formatada, $horarios_ocupados)) {
                $horarios_inicio[] = $hora_formatada;
            }
    
            $proximo = clone $inicio;
            $proximo->modify('+30 minutes');
    
            if ($proximo <= $fim && !in_array($proximo->format('H:i'), $horarios_ocupados)) {
                $horarios_fim[] = $proximo->format('H:i');
            }
    
            $inicio->modify('+30 minutes');
        }
    
        return response()->json([
            'data' => $request->data,
            'id_sala' => $request->id_sala,
            'horarios_inicio' => $horarios_inicio,
            'horarios_fim' => $horarios_fim
        ]);
    }
    
    
}
