<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmpresaResource;
use App\Services\EmpresaServices;
use Illuminate\Http\Request;

class EmpresaApiController extends Controller
{
    protected $empresaServices;

    public function __construct(EmpresaServices $empresaServices)
    {
        $this->empresaServices = $empresaServices;
    }

    public function index(Request $request)
    {
        $page = $request->get('per_page', 15);
        $empresa = $this->empresaServices->getAllEmpresa($page);
        return EmpresaResource::collection($empresa);
    }


    public function show($uuid)
    {
        if($empresa = $this->empresaServices->getCategoriaByUuid($uuid)){
            return new EmpresaResource($empresa);
        }else{
            return response()->json(['message' => 'Not Found'], 404);
        }
    }
}
