<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resultado;

class ResultadoController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:api', ['except' => ['index']]);
        $this->middleware('auth:api');
    }

    public function index()
    {
        return response()->json(Resultado::all(), 200);
    }

    public function show(Request $request){
        //$us = auth()->user();
        $resultados = Resultado::where("i","=", $request->i)->get();
        return response()->json($resultados, 200);//Empleado::where('id', 1)->get();
        //return response()->json(Estudiante::all(), 200);
    }

    public function store(Request $request)
    {
        $resultado = Resultado::create($request->all());
            return response()->json($resultado, 201);
        /*
        $us = auth()->user();
        if($us->ro == "Admin"){
            $resultado = Resultado::create($request->all());
            return response()->json($resultado, 201);
        }else{
            return response()->json(['error' => 'El rol no tiene permisos'], 403);
        }
        */
    }

    public function update(Request $request){
        $us = auth()->user();
        if($us->ro == "Admin"){
            $resultado = Resultado::findOrFail($request->i);
            $resultado->t = $request->t;
            $resultado->n = $request->n;
            $resultado->i = $request->i;
            $resultado->save();
            return response()->json($resultado, 200);
        }else{
            return response()->json(['error' => 'El rol no tiene permisos'], 403);
        }
    }
/*
        'n',
        'a',
        'f',
        'i',
*/
    public function delete(string $request){
        Resultado::destroy((int)$request);
            return response()->json('Borrado', 204);
        /*
        $us = auth()->user();
        if($us->ro == "Admin"){
            Resultado::destroy((int)$request);
            return response()->json('Borrado', 204);
        }else{
            return response()->json(['error' => 'El rol no tiene permisos'], 403);
        }
        */
    }
}
