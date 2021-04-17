<?php

namespace App\Http\Controllers\Admin\Acl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permissao;

class PermissaoRoleController extends Controller
{
    private $dadosRole, $dadosPermissao;

    public function __construct(Role $role, Permissao $permissao){
        $this->dadosRole = $role;
        $this->dadosPermissao = $permissao;
        //$this->middleware('can:Permissão');
    }

    public function listaPermissao($id){
        $role = $this->dadosRole->find($id);

        if(empty($role)){
            return redirect()->back();
        }

        $permissaos = $role->permissaos()->paginate();

        return view('admin.roles.permissaorole.index', compact('role', 'permissaos'));
    }


    public function createPermissao($id){
        $role = $this->dadosRole->find($id);

        if(empty($role)){
            return redirect()->back();
        }

        $permissaos = $role->createPermissao();

        return view('admin.roles.permissaorole.create', compact('role', 'permissaos'));
    }

    public function storePermissao(Request $request, $id){
        $role = $this->dadosRole->find($id);

        if(empty($role)){
            return redirect()->back();
        }

        if(!empty($request->permissao)){
            $role->permissaos()->attach($request->permissao);
            return redirect()
                ->route('role.permissao', $role->id)
                ->with('success', 'Permissões adicionada com sucesso');
        }else{
            return redirect()->back()->with('error', 'Deve selecionar pelo uma permissão');;
        }

    }


    public function searchPermissao(Request $request, $id){
        $role = $this->dadosRole->find($id);

        $permissaos = $role->searchPermissao($request->filtrar);
        $filtros = $request->except('_token');

        return view('admin.roles.permissaorole.create', compact('role', 'permissaos', 'filtros'));
    }

    public function detachPermissao($idRole, $idPermissao){
        $role = $this->dadosRole->find($idRole);
        $permissao = $this->dadosPermissao->find($idPermissao);

        if(empty($role) || empty($permissao)){
            return redirect()->back();
        }

        $role->permissaos()->detach($permissao);
        return redirect()
                ->route('role.permissao', $role->id)
                ->with('message', 'Permissões removida com sucesso');
    }
}
