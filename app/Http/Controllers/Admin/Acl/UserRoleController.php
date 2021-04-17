<?php

namespace App\Http\Controllers\Admin\Acl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class UserRoleController extends Controller
{
    private $dadosRole, $dadosUser;

    public function __construct(Role $role, User $user){
        $this->dadosRole = $role;
        $this->dadosUser = $user;
        //$this->middleware('can:Permissão');
    }

    public function listaUser($id){
        $user = $this->dadosUser->find($id);

        if(empty($user)){
            return redirect()->back();
        }

        $roles = $user->roles()->paginate();

        return view('admin.usuario.user-role.index', compact('user', 'roles'));
    }


    public function createUser($id){
        $user = $this->dadosUser->find($id);

        if(empty($user)){
            return redirect()->back();
        }

        $roles = $user->createRole();

        return view('admin.usuario.user-role.create', compact('user', 'roles'));
    }

    public function storeUser(Request $request, $id){
        $user = $this->dadosUser->find($id);

        if(empty($user)){
            return redirect()->back();
        }

        if(!empty($request->role)){
            $user->roles()->attach($request->role);
            return redirect()
                ->route('user.role', $user->id)
                ->with('success', 'Funções adicionada com sucesso');
        }else{
            return redirect()->back()->with('error', 'Deve selecionar pelo uma função');;
        }

    }


    public function searchUser(Request $request, $id){
        $user = $this->dadosUser->find($id);

        $roles = $user->searchUser($request->filtrar);
        $filtros = $request->except('_token');

        return view('admin.usuario.user-role.create', compact('user', 'roles', 'filtros'));
    }

    public function detachUser($idUser, $idRole){
        $role = $this->dadosRole->find($idRole);
        $user = $this->dadosUser->find($idUser);

        if(empty($role) || empty($user)){
            return redirect()->back();
        }

        $user->roles()->detach($role);
        return redirect()
                ->route('user.role', $user->id)
                ->with('message', 'Permissões removida com sucesso');
    }
}
