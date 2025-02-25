<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salas extends Model
{
    use HasFactory;
    protected $table = 'salas';

    public function unidades()

    {

        return $this->hasOne(Unidades::class, 'id', 'id_unidade');

    }

    public function fotos()

    {

        return $this->hasMany(FotosSala::class, 'id_sala', 'id');

    }


    
    public function facilidades()

    {

        return $this->hasMany(Facilidades::class, 'id_sala', 'id');

    }

       
    public function prereservas()

    {

        return $this->hasMany(PreReserva::class, 'id_sala', 'id');

    }

       
    public function configuracao()

    {

        return $this->hasOne(ConfiguracoesSalas::class, 'id_sala', 'id');

    }

       
    public function horarios()

    {

        return $this->hasOne(HorariosFuncionamento::class, 'id_sala', 'id');

    }
}
