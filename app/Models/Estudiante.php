<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    public $timestamps = false;

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