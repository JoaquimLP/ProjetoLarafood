<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perfil;
use App\Models\Permissao;

class PerfilPermissaoController extends Controller
{
    private $dadosPerfil, $dadosPermissao;

    public function __construct(Perfil $perfil, Permissao $permissao){
        $this->dadosPerfil = $perfil;
        $this->dadosPermissao = $permissao;
        $this->middleware('can:Perfis');
    }

    public function listaPerfil($id){
        $permissao = $this->dadosPermissao->find($id);
        //dd($permissaos);
        if(empty($permissao)){
            return redirect()->back();
        }

        $perfils = $permissao->perfil()->paginate();

        return view('admin.permissao.perfilPermissao.index', compact('perfils', 'permissao'));
    }


    public function createPerfil($id){
        $permissao = $this->dadosPermissao->find($id);

        if(empty($permissao)){
            return redirect()->back();
        }

        $perfils = $permissao->createPerfil();

        return view('admin.permissao.perfilPermissao.create', compact('perfils', 'permissao'));
    }

    public function storePerfil(Request $request, $id){
        $permissao = $this->dadosPermissao->find($id);
        if(empty($permissao)){
            return redirect()->back();
        }

        if(!empty($request->perfil)){
            $permissao->perfil()->attach($request->perfil);
            return redirect()
                ->route('permissao.perfil', $permissao->id)
                ->with('success', 'perfil adicionada com sucesso');
        }else{
            return redirect()->back()->with('error', 'Deve selecionar pelo uma perfil');;
        }

    }


    public function searchPerfil(Request $request, $id){
        $permissao = $this->dadosPermissao->find($id);

        $perfils = $permissao->searchPerfil($request->filtrar);
        $filtros = $request->except('_token');

        return view('admin.permissao.perfilPermissao.create', compact('perfils', 'permissao', 'filtros'));
    }

    public function detachPerfil($idPermissao, $idPerfil){
        $perfil = $this->dadosPerfil->find($idPerfil);
        $permissao = $this->dadosPermissao->find($idPermissao);

        if(empty($perfil) || empty($permissao)){
            return redirect()->back();
        }

        $permissao->perfil()->detach($perfil);
        return redirect()
                ->route('permissao.perfil', $permissao->id)
                ->with('message', 'Permissões removida com sucesso');
    }
}
