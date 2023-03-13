<?php

use App\Http\Controllers\AuthControlller;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//usuario autenticado
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [AuthControlller::class, 'logout']);//login
    
    Route::apiResource('/pedido', PedidoController::class);//almacenar ordenes

});

Route::apiResource('/categorias', CategoriaController::class);
Route::apiResource('/productos', ProductoController::class);

//autenticacion
Route::post('/registro', [AuthControlller::class, 'register']);//registro
Route::post('/login', [AuthControlller::class, 'login']);//login