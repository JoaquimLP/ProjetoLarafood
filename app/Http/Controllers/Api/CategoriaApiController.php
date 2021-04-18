<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmpresaFormRequest;
use App\Http\Resources\CategoriaResource;
use App\Services\CategoriaServices;
use App\Services\EmpresaServices;
use Illuminate\Http\Request;

class CategoriaApiController extends Controller
{
    protected $empresa, $categoria;
    public function __construct(EmpresaServices $empresa, CategoriaServices $categoria)
    {
        $this->empresa = $empresa;
        $this->categoria = $categoria;

    }

    public function getCategoriaByEmpresa(EmpresaFormRequest $request)
    {
        //if (!$request->token)
        //    return response()->json(['message' => 'Token Not Found'], 404);

        return CategoriaResource::collection($this->categoria->getCategoriaByEmpresaUuid($request->token));
    }

    public function show(EmpresaFormRequest $request, $url)
    {
        if($categoria = $this->categoria->getCategoriaByUrl($url))
            return new CategoriaResource($categoria);

        return response()->json(['message' => 'Category Not Found'], 404);
    }


}
