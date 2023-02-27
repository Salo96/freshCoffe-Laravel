<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriaCollection;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(){
        //dd('desde api/ categoria controller');
        //return response()->json(['categorias' => Categoria::all()]);// select * from categoria y viene con formato json, Categoria::all viene del modelo
        return new CategoriaCollection(Categoria::all());// CategoriaCollection da la respuesta en json, solo llamo el modelo y el metodo all
    }
}
