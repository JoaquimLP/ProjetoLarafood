<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
            'status' => $this->statusOptions[$this->status],
            'empresa' => new EmpresaResource($this->empresa),
            'cliente' => $this->cliente_id ? new ClienteResource($this->cliente) : "",
            'mesa' => $this->mesa_id ? new MesaResource($this->mesa) : "",
            'produtos' => ProdutoResource::collection($this->produtos),
            'date' => Carbon::parse($this->created_at)->format('Y-m-d'),
            'avaliacao' => AvaliacaoResource::collection($this->avaliacao),
        ];
    }
}
