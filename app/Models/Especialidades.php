<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidades extends Model
{
    //
    protected $fillable = [
        'nome'
    ];

    public function especialidade()
    {
        return $this->belongsTo(Especialidades::class, 'id_especialidade');
    }
}
