<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class EmpresaResource extends JsonResource
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
            'uuid' => $this->uuid,
            'flag' => $this->url,
            'cantact' => $this->email,
            'logo' => $this->logo ? url("storage/$this->logo") : '',
            'date_creatad' => Carbon::parse($this->created_at)->format('d/m/Y'),
        ];
    }
}
