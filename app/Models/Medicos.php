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
    ];

    public function agendamentos()
    {
        return $this->hasMany(Agendamentos::class, 'id_medico', 'id');
    }
}
