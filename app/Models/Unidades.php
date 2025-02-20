<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidades extends Model
{
    use HasFactory;

    protected $table = 'unidade';

    public function salas()

    {

        return $this->hasMany(Salas::class, 'id_unidade', 'id')->with('facilidades')->with('fotos');

    }
}
