<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    //pertenece al modelo de usuario
    public function user(){
        return $this->belongsTo(User::class);
    }

    //relacion de mucho a mucho de producto a pedido producto
    public function productos(){
        return $this->belongsToMany(Producto::class, 'pedido_productos')->withPivot('cantidad');// <- agregame la cantidad con withPivot que viene pedido producto;
    }
}
