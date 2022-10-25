<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nombre;

use Illuminate\Foundation\Console\Presets\React;

class indexController extends Controller
{
    //
    function index(Request $request){
        Nombre::create([
            "nombre"=>$request->input("nombre"),
            "edad"=>$request->input("edad")
        ]);

    }
    function leer(){
        $nombres=Nombre::all();
        return view("leer",compact("nombres"));
    }
    function eliminar(Request $request){
        $resultado=Nombre::find($request[0]);
        $resultado->delete();
        return "listo";
         

    }
    function ver(){
        $nombres=Nombre::all();
        return view("ver",compact("nombres"));
        
    }
    function editar(Request $request){
        $resultados=Nombre::find($request[0]);
        return $resultados;

    }
    function gaurdarData(Request $request){
        dump($request->input());
        Nombre::where("id",$request->input("identificador"))->update(["nombre"=>$request->input("nombre"),"edad"=>$request->input("edad")]);
        return "esgtado";
    }

}
