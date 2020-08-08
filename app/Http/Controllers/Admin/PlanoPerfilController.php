<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plano;
use App\Models\Perfil;

class PlanoPerfilController extends Controller
{
    private $dadosPlano, $dadosPerfil;

    public function __construct(Plano $plano, Perfil $perfil){
        $this->dadosPlano = $plano;
        $this->dadosPerfil = $perfil;
    }

    public function indexPlano($id){
        $perfil = $this->dadosPerfil->find($id);

        if(empty($perfil)){
            return redirect()->back();
        }
        $planos = $perfil->planos()->paginate();
        return view("admin.perfil.planoPerfil.index", compact('perfil', 'planos'));
    }

    public function createPlano($id){
        $perfil = $this->dadosPerfil->find($id);

        if(empty($perfil)){
            return redirect()->back();
        }
        $planos = $perfil->createPlanos();

        return view("admin.perfil.planoPerfil.create", compact('perfil', 'planos'));
    }

    public function storePlano(Request $request, $id){
        $perfil = $this->dadosPerfil->find($id);
        if(empty($perfil)){
            return redirect()->back();
        }

        if(!empty($request->plano)){
            $perfil->planos()->attach($request->plano);
            return redirect()
                ->route('perfil.plano', $perfil->id)
                ->with('success', 'Planos adicionada com sucesso');
        }else{
            return redirect()->back()->with('error', 'Deve selecionar pelo um plano');;
        }
    }

    public function sdetachPlano($idPerfil, $idPlano){
        $perfil = $this->dadosPerfil->find($idPerfil);
        $plano = $this->dadosPlano->find($idPlano);

        if(empty($perfil) || empty($plano)){
            return redirect()->back();
        }
     
        $perfil->planos()->detach($plano);
        return redirect()
                ->route('perfil.plano', $perfil->id)
                ->with('message', 'Planos removido com sucesso');
    }
}
