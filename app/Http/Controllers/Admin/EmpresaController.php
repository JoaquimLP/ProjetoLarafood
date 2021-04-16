<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateEmpresaRequest;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{
    private $dadosEmpresa;

    public function __construct(Empresa $empresa)
    {
        $this->dadosEmpresa = $empresa;
        $this->middleware('can:Empresas');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = $this->dadosEmpresa->paginate();
        return view('admin.empresa.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateEmpresaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateEmpresaRequest $request)
    {
        $empresa = auth()->user()->empresa;
        $data = $request->all();
        if($request->hasFile('image') && $request->image->isValid()){
            $data['logo'] = $request->image->store("empresa/logo/{$empresa->uuid}");
        }
        $this->dadosEmpresa->create($data);
        return redirect()->route('empresa.index')->with('success', 'Empresa cadastrada com sucesso..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = $this->dadosEmpresa->find($id);

        if(!$empresa){
            return redirect()->back();
        }


        return view('admin.empresa.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = $this->dadosEmpresa->find($id);

        if(!$empresa){
            return redirect()->back();
        }

        return view('admin.empresa.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateEmpresaRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateEmpresaRequest $request, $id)
    {
        $empresa = $this->dadosEmpresa->find($id);

        if(!$empresa){
            return redirect()->back();
        }

        $data = $request->all();
        if($request->hasFile('image') && $request->image->isValid()){
            if(Storage::exists($empresa->logo)){
                Storage::delete($empresa->logo);
            }
            $data['logo'] = $request->image->store("empresa/logo/{$empresa->uuid}");
        }
        $data['cnpj'] = str_replace(['.', '/','-'], '', $data['cnpj']);
        $empresa->update($data);
        return redirect()->route('empresa.index')->with('success', 'Dados atualizado com sucesso..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = $this->dadosEmpresa->find($id);

        if(empty($empresa)){
            return redirect()
            ->back()
            ->with('error', 'Existe Empresas vinculado a essa empresa, portando não pode deletar');
        }
        if(Storage::exists($empresa->image)){
            Storage::delete($empresa->image);
        }
        $empresa->delete();
        return redirect()
            ->route('empresa.index')
            ->with('message', 'Resgistro deletado com sucesso');
    }

    public function search(Request $request){
        $filtros = $request->only('filtrar');

        $empresas = $this->dadosEmpresa
            ->where(function($query) use($request){
                if($request){
                    $query->orWhere('titulo', 'LIKE', "%{$request->filtrar}%")
                    ->orWhere('descricao', 'LIKE', "%{$request->filtrar}%");
                }
            })->paginate();


        return view('admin.empresa.index', compact('empresas', 'filtros'));
    }
}
