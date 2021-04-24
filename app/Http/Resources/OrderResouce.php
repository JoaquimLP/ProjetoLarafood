<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResouce extends JsonResource
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
            'identify' => $this->identify,
            'total' => $this->total,
            'status' => $this->status,
            'cliente' => $this->cliente_id ? new ClienteResource($this->cliente) : "",
            'mesa' => $this->mesa_id ? new MesaResource($this->mesa) : "",
            'produtos' => ProdutoResource::collection($this->produtos)

        ];
    }
}
