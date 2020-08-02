<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Permissao;
use App\Http\Requests\StoreUpdatePermissaoRequest;

class PermissaoController extends Controller
{
    private $repositorio;

    public function __construct(Permissao $permissao){

        $this->repositorio = $permissao;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissaos = $this->repositorio->latest()->paginate(4);

        return view('admin.permissao.index', compact('permissaos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdatePermissaoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePermissaoRequest $request)
    {
        $this->repositorio->create($request->all());
        return redirect()
            ->route('permissao.index')
            ->with('success', 'Permissão cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permissao = $this->repositorio->find($id);

        return view('admin.permissao.show', compact('permissao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissao = $this->repositorio->find($id);
        return view('admin.permissao.edit', compact('permissao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdatePermissaoRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePermissaoRequest $request, $id)
    {
        $permissao = $this->repositorio->find($id);
        if(empty($permissao)){
            return redirect()
            ->back();
        }

        $permissao->update($request->all());
        return redirect()
            ->route('permissao.index')
            ->with('success', 'Permissão editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permissao = $this->repositorio->find($id);

        if(empty($permissao)){
            return redirect()
            ->back()
            ->with('error', 'Existe Planos vinculado a essa permissao, portando não pode deletar');
        }
        $permissao->delete();
        return redirect()
            ->route('permissao.index')
            ->with('message', 'Resgistro deletado com sucesso');
    }

    public function search(Request $request){
    
        $filtros = $request->except('_token');
        $permissaos = $this->repositorio->search($request->filtrar);
        return view('admin.permissao.index', compact('permissaos', 'filtros'));
    }
}
