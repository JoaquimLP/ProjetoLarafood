<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Plano;
use App\Http\Requests\StoreUpdatePlanosRequest;

class PlanoController extends Controller
{
    private $repositorio;

    public function __construct(Plano $plano){
        $this->repositorio = $plano;
    }

    public function index(){
        $planos = $this->repositorio->latest()->paginate(4);
        return view('admin.planos.index', compact('planos'));
    }

    public function create(){
        return view('admin.planos.create');
    }

    public function store(StoreUpdatePlanosRequest $request){
 
        $this->repositorio->create($request->all());
        return redirect()->route('plano.index');
    }

    public function show($url){
        $plano = $this->repositorio->where('url', $url)->first();

        if (empty($plano)) {
            return redirect()->back();
        } 
        return view('admin.planos.show', compact('plano'));
        
    }

    public function edit($id){
        $plano = $this->repositorio->find($id);


        if (empty($plano)) {
            return redirect()->back();
        } 
        return view('admin.planos.edit', compact('plano'));
        
    }

    public function update(StoreUpdatePlanosRequest $request, $id){
        
        $plano = $this->repositorio->find($id);
        if (empty($plano)) {
            return redirect()->back();
        }
        $plano->update($request->all());
        return redirect()->route('plano.index');
        
    }

    public function destroy($url){
        $plano = $this->repositorio->where('url', $url)->first();

        if (empty($plano)) {
            return redirect()->back();
        } 
        $plano->delete();
        return redirect()->route('plano.index');
        
    }

    public function search(Request $request){
        $planos = $this->repositorio->search($request->filtrar);
        $filtros = $request->except('_token');
        return view('admin.planos.index', compact('planos', 'filtros'));
        
    }
}
