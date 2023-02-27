<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
                //campos que quiero que me retorne
                return[
                    'id' => $this->id,
                    'nombre' => $this->nombre,
                    'precio' => $this->precio,
                    'imagen' => $this->imagen,
                    'disponible' => $this->disponible,
                    'categoria_id' => $this->categoria_id,
                ];
        return parent::toArray($request);
    }
}
