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
        $role = $this->dadosRole->find($id);

        if(empty($role)){
            return redirect()->back();
        }

        $users = $role->users()->paginate();

        return view('admin.roles.user-role.index', compact('role', 'users'));
    }


    public function createUser($id){
        $role = $this->dadosRole->find($id);

        if(empty($role)){
            return redirect()->back();
        }

        $users = $role->createUser();

        return view('admin.roles.user-role.create', compact('role', 'users'));
    }

    public function storeUser(Request $request, $id){
        $role = $this->dadosRole->find($id);

        if(empty($role)){
            return redirect()->back();
        }

        if(!empty($request->user)){
            $role->users()->attach($request->user);
            return redirect()
                ->route('role.user', $role->id)
                ->with('success', 'Permissões adicionada com sucesso');
        }else{
            return redirect()->back()->with('error', 'Deve selecionar pelo uma permissão');;
        }

    }


    public function searchUser(Request $request, $id){
        $role = $this->dadosRole->find($id);

        $users = $role->searchUser($request->filtrar);
        $filtros = $request->except('_token');

        return view('admin.roles.user-role.create', compact('role', 'users', 'filtros'));
    }

    public function detachUser($idRole, $idUser){
        $role = $this->dadosRole->find($idRole);
        $user = $this->dadosUser->find($idUser);

        if(empty($role) || empty($user)){
            return redirect()->back();
        }

        $role->users()->detach($user);
        return redirect()
                ->route('role.user', $role->id)
                ->with('message', 'Permissões removida com sucesso');
    }
}
