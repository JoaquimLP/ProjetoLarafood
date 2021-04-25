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
        $this->middleware('can:Planos');
    }

    public function index(){
        $planos = $this->repositorio->latest()->paginate(10);
        return view('admin.planos.index', compact('planos'));
    }

    public function create(){
        return view('admin.planos.create');
    }

    public function store(StoreUpdatePlanosRequest $request){

        $data = $request->all();
        $data['preco'] = str_replace(['.', ','], ['', '.'], $data['preco']);

        $this->repositorio->create($data);
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
        $data = $request->all();
        $data['preco'] = str_replace(['.', ','], ['', '.'], $data['preco']);
        $plano->update($request->all());
        return redirect()->route('plano.index');

    }

    public function destroy($url){
        $plano = $this->repositorio
            ->with('detalhes')
            ->where('url', $url)->first();
        if($plano->detalhes->count() > 0){
            return redirect()
                ->back()
                ->with('error', 'Existe detalhes vinculado a esse plano, portando não pode deletar');
        }
        if (empty($plano)) {
            return redirect()->back();
        }
        $plano->delete();
        return redirect()
            ->route('plano.index')
            ->with('message', 'Resgistro deletado com sucesso');

    }

    public function search(Request $request){
        $planos = $this->repositorio->search($request->filtrar);
        $filtros = $request->except('_token');
        return view('admin.planos.index', compact('planos', 'filtros'));

    }
}
