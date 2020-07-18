<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

    public function create(){
        return view('admin.planos.create');
    }

    public function store(Request $request){
        $data = $request->all();
        $data["url"] = Str::kebab($request->nome);
        $this->repositorio->create($data);
        return redirect()->route('plano.index');
    }
}
