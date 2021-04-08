<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicos extends Model
{
    //
    protected $fillable = [
        'nome',
        'idade',
        'data_nascimento',
        'sexo',
        'registro',
        'celular',
        'id_especialidade',
    ];

    public function especialidade()
    {
        return $this->hasOne(Especialidades::class, 'id', 'id_especialidade');
    }
    
}
