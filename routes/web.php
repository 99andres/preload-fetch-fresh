<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\indexController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Nombre;
use Illuminate\Support\Facades\DB;

Route::get('/',function(){

    return view("index");
});

Route::post('proceso',[indexController::class,'index']);
Route::get("leer",[indexController::class,'leer']);
Route::post("procesandoEliminar",[indexController::class,'eliminar']);
Route::post("procesandoEditar",[indexController::class,'editar']);
Route::post("gaurdarData",[indexController::class,'gaurdarData']);
Route::get("ver",[indexController::class,"ver"]);