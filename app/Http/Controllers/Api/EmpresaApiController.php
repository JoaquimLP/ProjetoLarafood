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

    public function index()
    {
        return EmpresaResource::collection($this->empresaServices->getAllEmpresa());
    }
}
