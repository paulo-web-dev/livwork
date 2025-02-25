<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreReserva extends Model
{
    use HasFactory;

    protected $table = 'pre_reserva';


    public function sala()

    {

        return $this->hasOne(Salas::class, 'id', 'id_sala')->with('unidades')
        ->with('fotos')
        ->with('facilidades')
        ->with('configuracao')
        ->with('horarios')
        ->with('prereservas');

    }

    public function reserva(){
        return $this->hasOne(Reservas::class, 'id_pre_reserva', 'id');
    }
}
