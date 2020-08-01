<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetalhesPlano;
use App\Models\Plano;
class DetalhesPlanoController extends Controller
{
    protected $detalhesPlano, $plano;

    public function __construct(DetalhesPlano $detalhesPlanos, Plano $plano){
        $this->detalhesPlano = $detalhesPlanos;
        $this->plano = $plano;
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

    public function store(Request $request, $url){
        $plano = $this->plano->where('url', $url)->first();

        if(empty($plano)){
            return redirect()->back();
        }

        $detalhes = $plano->detalhes()->create( $request->all());
        return redirect()->route('detalhes.index', $plano->id);   
    } 


    public function edit($url){
        $plano = $this->plano->where('url', $url)->first();

        if(empty($plano)){
            return redirect()->back();
        }
        $detalhe = $plano->detalhes()->first();

        return view('admin.detalhesPlano.edit', compact('detalhe', 'plano'));
    } 

    public function update(Request $request, $id){
        $detalhes = $this->detalhesPlano->find($id);
        dd($detalhes);
        $plano = $this->plano->where('id', $detalhes->plano_id)->first();
        
        if(empty($plano)){
            return redirect()->back();
        }

        $data = $request->all();
        $detalhes = $detalhes->update($data);
        return redirect()->route('detalhes.index', $plano->url);     
    } 
}
