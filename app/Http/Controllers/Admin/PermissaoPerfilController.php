<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perfil;
use App\Models\Permissao;

class PermissaoPerfilController extends Controller
{
    private $dadosPerfil, $dadosPermissao;

    public function __construct(Perfil $perfil, Permissao $permissao){
        $this->dadosPerfil = $perfil;
        $this->dadosPermissao = $permissao;
    }

    public function listaPermissao($id){
        $perfil = $this->dadosPerfil->find($id);

        if(empty($perfil)){
            return redirect()->back();
        }

        $permissaos = $perfil->permissaos()->paginate();

        return view('admin.perfil.permissaoPerfil.index', compact('perfil', 'permissaos'));
    }


    public function createPermissao($id){
        $perfil = $this->dadosPerfil->find($id);

        if(empty($perfil)){
            return redirect()->back();
        }

        $permissaos = $perfil->createPermissao();

        return view('admin.perfil.permissaoPerfil.create', compact('perfil', 'permissaos'));
    }

    public function storePermissao(Request $request, $id){
        $perfil = $this->dadosPerfil->find($id);

        if(empty($perfil)){
            return redirect()->back();
        }

        if(!empty($request->permissao)){
            $perfil->permissaos()->attach($request->permissao);
            return redirect()
                ->route('perfil.permissao', $perfil->id)
                ->with('success', 'Permissões adicionada com sucesso');
        }else{
            return redirect()->back()->with('error', 'Deve selecionar pelo uma permissão');;
        }

    }


    public function searchPermissao(Request $request, $id){
        $perfil = $this->dadosPerfil->find($id);

        $permissaos = $perfil->searchPermissao($request->filtrar);
        $filtros = $request->except('_token');
     
        return view('admin.perfil.permissaoPerfil.create', compact('perfil', 'permissaos', 'filtros'));
    }

    public function detachPermissao($idPerfil, $idPermissao){
        $perfil = $this->dadosPerfil->find($idPerfil);
        $permissao = $this->dadosPermissao->find($idPermissao);

        if(empty($perfil) || empty($permissao)){
            return redirect()->back();
        }
     
        $perfil->permissaos()->detach($permissao);
        return redirect()
                ->route('perfil.permissao', $perfil->id)
                ->with('message', 'Permissões removida com sucesso');
    }
}
