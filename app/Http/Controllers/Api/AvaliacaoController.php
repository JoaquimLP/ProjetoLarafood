<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ApiStoreAvaliacao;
use App\Http\Resources\AvaliacaoResource;
use App\Services\AvaliacaoServices;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    protected $avaliacao;

    public function __construct(AvaliacaoServices $avaliacao)
    {
        $this->avaliacao = $avaliacao;
    }

    public function store(ApiStoreAvaliacao $request, $identify)
    {
        $data = $request->only('stars', 'comentario');
        $avaliacao = $this->avaliacao->newAvaliacaoOrder($identify, $data);

        return new AvaliacaoResource($avaliacao);
    }
}
