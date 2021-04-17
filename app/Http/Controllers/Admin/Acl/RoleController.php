<?php

namespace App\Http\Controllers\Admin\Acl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Http\Requests\StoreUpdateRolesRequest;

class RoleController extends Controller
{
    private $repositorio;

    public function __construct(Role $role){

        $this->repositorio = $role;
        $this->middleware('can:Roles');
    }

    public function index(){
        $roles = $this->repositorio->latest()->paginate(10);
        return view('admin.roles.index', compact('roles'));
    }

    public function create(){
        return view('admin.roles.create');
    }

    public function store(StoreUpdateRolesRequest $request){

        $this->repositorio->create($request->all());
        return redirect()->route('role.index');
    }

    public function show($id){
        $role = $this->repositorio->where('id', $id)->first();

        if (empty($role)) {
            return redirect()->back();
        }
        return view('admin.roles.show', compact('role'));

    }

    public function edit($id){
        $role = $this->repositorio->find($id);


        if (empty($role)) {
            return redirect()->back();
        }
        return view('admin.roles.edit', compact('role'));

    }

    public function update(StoreUpdateRolesRequest $request, $id){

        $role = $this->repositorio->find($id);
        if (empty($role)) {
            return redirect()->back();
        }
        $role->update($request->all());
        return redirect()->route('role.index');

    }

    public function destroy($id){
        $role = $this->repositorio->find($id);
        /* if($role->detalhes->count() > 0){
            return redirect()
                ->back()
                ->with('error', 'Existe detalhes vinculado a esse role, portando não pode deletar');
        } */
        if (empty($role)) {
            return redirect()->back();
        }
        $role->delete();
        return redirect()
            ->route('role.index')
            ->with('message', 'Resgistro deletado com sucesso');

    }

    public function search(Request $request){
        $roles = $this->repositorio->search($request->filtrar);
        $filtros = $request->except('_token');
        return view('admin.roles.index', compact('roles', 'filtros'));

    }
}
