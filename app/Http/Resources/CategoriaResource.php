<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriaResource extends JsonResource
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
            'icono' => $this->icono
        ];

        return parent::toArray($request);
    }
}
