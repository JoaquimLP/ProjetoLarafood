<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
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
            'produto' => $this->titulo,
            'flag' => $this->flag,
            'preco' => $this->preco,
            'descricao' => $this->descricao,
            'image' => $this->image ? url("storage/$this->image") : '',
        ];
    }
}
