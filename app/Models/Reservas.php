<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;

    protected $table = 'reserva';
    
    public function preReserva()

    {

        return $this->hasOne(PreReserva::class, 'id', 'id_pre_reserva')->with('sala');

    }
}
