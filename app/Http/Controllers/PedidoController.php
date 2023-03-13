<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoProducto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        //almacenar una orden
        $pedido = new Pedido;
        $pedido->user_id = Auth::user()->id; //tener el usuario autenticado
        $pedido->total = $r->total;
        $pedido->save();

        //obtener el id del pedido
        $id = $pedido->id;//<- este valor viene de react

        //obtener los producto
        $productos = $r->productos;//<- este valor viene de react

        //formatear el arreglo
        $pedido_producto = [];

        foreach ($productos as $producto) {
            $pedido_producto[] = [
                //pedido_id y producto_id viene de la bd
                'pedido_id' => $id,
                'producto_id' => $producto['id'],//<- este valor viene de react de quiosco
                'cantidad' => $producto['cantidad'],//<- este valor viene de react de quiosco
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }

        //guardar en la bd, insert PERMITE INSERTAR UN ARREGLO A CAMBIO DE CREATE QUE SOLO GUARDA EL CAMPO DEL FORMULARIO
        PedidoProducto::insert($pedido_producto);

        //mensaje para el fron
        return [
            'message' => 'Pedido realizado correctamente, estara listo en unos minutos'
            // 'message' => 'realizando pedido ' . $pedido->id,
            // 'productos' => $r->productos
        ];

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
