<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmpresaFormRequest;
use App\Http\Resources\ProdutoResource;
use App\Services\ProdutoServices;
use Illuminate\Http\Request;

class ProdutoApiController extends Controller
{
    protected $produto;

    public function __construct(ProdutoServices $produto)
    {
        $this->produto = $produto;
    }

    public function produtoByEmpresa(EmpresaFormRequest $request)
    {
        $categoria = $request->get('categoria', []);
        $produto = ProdutoResource::collection($this->produto->getProdutoByEmpresaUuid($request->token, $categoria));

        return $produto;


    }

    public function show(EmpresaFormRequest $request, $flag)
    {
        if($produto = $this->produto->getProdutoByFlag($flag))
            return new ProdutoResource($produto);

        return response()->json(['message' => 'Produto Not Found'], 404);
    }
}
