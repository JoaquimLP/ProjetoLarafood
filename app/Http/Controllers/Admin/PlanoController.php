<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plano;

class PlanoController extends Controller
{
    private $repositorio;

    public function __construct(Plano $plano){
        $this->repositorio = $plano;
    }
    public function index(){
        $planos = $this->repositorio->latest()->paginate(10);
        return view('admin.planos.index', compact('planos'));
    }
}
