<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmpresaFormRequest;
use App\Http\Resources\MesaResource;
use App\Services\MesaServices;

class MesaApiController extends Controller
{
    protected $empresa, $mesa;
    public function __construct(MesaServices $mesa)
    {
        $this->mesa = $mesa;
    }

    public function getMesaByEmpresa(EmpresaFormRequest $request)
    {
        //if (!$request->token)
        //    return response()->json(['message' => 'Token Not Found'], 404);
        return MesaResource::collection($this->mesa->getMesaByEmpresaUuid($request->token));
    }

    public function show(EmpresaFormRequest $request, $url)
    {
        if($mesa = $this->mesa->getMesaByUrl($url))
            return new MesaResource($mesa);

        return response()->json(['message' => 'Mesa Not Found'], 404);
    }


}
