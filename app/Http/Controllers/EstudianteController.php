<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;

class EstudianteController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:api', ['except' => ['index']]);
        $this->middleware('auth:api');
    }

    //public function index()
    //{
    //    return response()->json(Estudiante::all(), 200);
    //}

    public function store(Request $request)
    {
        $us = auth()->user();

        $estudiante = $request->all();
        
        $estudiante['n'] = $request->n;
        $estudiante['a'] = $request->a;
        $estudiante['f'] = $request->f;
        $estudiante['i'] = $us->id;

        $newEstudiante = Estudiante::create($estudiante);
        return response()->json($newEstudiante, 201);
    }

    public function show(){
        $us = auth()->user();
        $estudiantes = Estudiante::where("i","=", $us->id)->get();
        return response()->json($estudiantes, 200);
    }

    public function update(Request $request){
        $estudiante = Estudiante::findOrFail($request->id);
        $estudiante->n = $request->n;
        $estudiante->a = $request->a;
        $estudiante->f = $request->f;
        $estudiante->i = $request->i;
        $estudiante->save();
        return response()->json($estudiante, 200);
        //$us = auth()->user();
        //if($us->ro == "Admin"){
        //    
        //}else{
        //    return response()->json(['error' => 'El rol no tiene permisos'], 403);
        //}
    }
    
    public function delete(string $request){
        Estudiante::destroy((int)$request);
        return response()->json('Borrado', 204);
    }
}
