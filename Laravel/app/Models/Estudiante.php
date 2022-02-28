<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    //el siguiente codigo guarda como null en las siguientes columnas created_at, updated_at
    //public $timestamps = false;

    use HasFactory;
    protected $fillable = [
        'n',
        'a',
        'f',
        'i',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function resultados(){
        return $this->hasMany('App\Models\Resultado');
    }
}
/*
    nombres: string
    apellidos: string
    fechaNacimiento: string
    idTutor: string
*/