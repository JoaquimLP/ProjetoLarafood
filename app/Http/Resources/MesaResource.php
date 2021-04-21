<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MesaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'nome' => $this->nome,
            'url' => $this->url,
            'uuid' => $this->uuid,
            'descricao' => $this->descricao,
        ];
    }
}
