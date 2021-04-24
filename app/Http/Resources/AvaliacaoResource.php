<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AvaliacaoResource extends JsonResource
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
            'stars' => $this->stars,
            'comentario' => $this->comentario,
            //'order' => $this->order_id ? new OrderResouce($this->order) : "",
        ];
    }
}
