<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;
    protected $fillable = [
        't',
        'n',
        'i',
    ];

    public function estudiante(){
        return $this->belongsTo('App\Models\Estudiante');
    }

}
/*
    tipoEjercicio: string
    nota: number
    idEstudiante: string
*/