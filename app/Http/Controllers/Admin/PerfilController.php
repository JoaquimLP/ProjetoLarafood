<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdatePerfilRequest;
use App\Models\Perfil;

class PerfilController extends Controller
{
    private $repositorio;

    public function __construct(Perfil $perfil){
        $this->repositorio = $perfil;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfils = $this->repositorio->latest()->paginate(10);

        return view('admin.perfil.index', compact('perfils'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.perfil.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePerfilRequest $request)
    {
        
        $this->repositorio->create($request->all());
        return redirect()
            ->route('perfil.index')
            ->with('success', 'Perfil cadastrado com sucesso');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perfil = $this->repositorio->find($id);
        
        if (empty($perfil)) {
            return redirect()->back();
        }

        return view('admin.perfil.show', compact('perfil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perfil = $this->repositorio->find($id);
        return view('admin.perfil.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePerfilRequest $request, $id)
    {
        $perfil = $this->repositorio->find($id);

        if(empty($perfil)){
            return redirect()
            ->back();
        }

        $perfil->update();
        return redirect()
            ->route('perfil.index')
            ->with('success', 'Perfil editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perfil = $this->repositorio->find($id);

        if(empty($perfil)){
            return redirect()
            ->back()
            ->with('error', 'Existe Planos vinculado a esse perfil, portando não pode deletar');
        }
        $perfil->delete();
        return redirect()
            ->route('perfil.index')
            ->with('message', 'Resgistro deletado com sucesso');
    }

    /**
     * 
     * Paramentro de pesquisa
     */

    public function search(Request $request){

        $filtros = $request->except('_token');
        $perfils = $this->repositorio->search($request->filtrar);
        
        return view('admin.perfil.index', compact('perfils', 'filtros'));
        
    }
}
