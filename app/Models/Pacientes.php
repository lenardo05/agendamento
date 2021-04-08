<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    //
    protected $fillable = [
        'nome',
        'idade',
        'data_nascimento',
        'sexo',
        'celular',
        'endereco',
    ];

}
