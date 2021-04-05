<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamentos extends Model
{
    //
    protected $fillable = [
        'id_paciente',
        'id_medico',
        'descricao',
        'datahora',
    ];

    public function medicos()
    {
        return $this->belongsTo(Medicos::class, 'id_medico');
    }

    public function pacientes()
    {
        return $this->belongsTo(Pacientes::class, 'id_paciente');
    }
}
