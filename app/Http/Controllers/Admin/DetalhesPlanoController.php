<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateDetelhesRequest;
use App\Models\DetalhesPlano;
use App\Models\Plano;
class DetalhesPlanoController extends Controller
{
    protected $detalhesPlano, $plano;

    public function __construct(DetalhesPlano $detalhesPlanos, Plano $plano){
        $this->detalhesPlano = $detalhesPlanos;
        $this->plano = $plano;
        $this->middleware('can:Planos');
    }

    public function index($url){
        $plano = $this->plano->where('url', $url)->first();

        if(empty($plano)){
            return redirect()->back();
        }
        $detalhes = $plano->detalhes()->paginate();

        return view('admin.detalhesPlano.index', compact('plano', 'detalhes'));
    }


    public function create($url){
        $plano = $this->plano->where('url', $url)->first();

        if(empty($plano)){
            return redirect()->back();
        }
        return view('admin.detalhesPlano.create', compact('plano'));
    }

    public function store(StoreUpdateDetelhesRequest $request, $url){
        $plano = $this->plano->where('url', $url)->first();

        if(empty($plano)){
            return redirect()->back();
        }

        $detalhes = $plano->detalhes()->create( $request->all());
        return redirect()->route('detalhes.index', $plano->url);
    }


    public function edit($id){
        $detalhe = $this->detalhesPlano->find($id);
        $plano = $this->plano->where('id', $detalhe->plano_id)->first();
        if(empty($plano)){
            return redirect()->back();
        }


        return view('admin.detalhesPlano.edit', compact('detalhe', 'plano'));
    }

    public function update(StoreUpdateDetelhesRequest $request, $id){
        $detalhes = $this->detalhesPlano->find($id);
        $plano = $this->plano->where('id', $detalhes->plano_id)->first();

        if(empty($plano)){
            return redirect()->back();
        }

        $data = $request->all();
        $detalhes = $detalhes->update($data);
        return redirect()->route('detalhes.index', $plano->url);
    }

    public function Show($url, $id){
        $detalhe = $this->detalhesPlano->find($id);
        $plano = $this->plano->where('url', $url)->first();

        if(empty($plano)){
            return redirect()->back();
        }

        return view('admin.detalhesPlano.show', compact('detalhe', 'plano'));
    }

    public function destroy($url, $id){
        $detalhe = $this->detalhesPlano->find($id);
        $plano = $this->plano->where('url', $url)->first();

        if(empty($plano)){
            return redirect()->back();
        }
        $detalhe->delete();
        return redirect()
            ->route('detalhes.index', $plano->url)
            ->with('message', 'Resgistro deletado com sucesso');
    }
}
