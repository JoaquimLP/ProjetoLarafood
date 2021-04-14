<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateMesaRequest;
use App\Models\Mesa;
use Illuminate\Http\Request;

class MesaController extends Controller
{
    private $dadosMesa;

    public function __construct(Mesa $mesa)
    {
        $this->dadosMesa = $mesa;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesas = $this->dadosMesa->paginate();
        return view('admin.mesa.index', compact('mesas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mesa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateMesaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateMesaRequest $request)
    {
        $empresa = auth()->user()->empresa;
        $data = $request->all();
        $data['empresa_id'] = $empresa->id;
        $this->dadosMesa->create($data);
        return redirect()->route('mesa.index')->with('success', 'Mesa cadastrada com sucesso..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mesa = $this->dadosMesa->find($id);

        if(!$mesa){
            return redirect()->back();
        }

        return view('admin.mesa.show', compact('mesa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mesa = $this->dadosMesa->find($id);

        if(!$mesa){
            return redirect()->back();
        }

        return view('admin.mesa.edit', compact('mesa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateMesaRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateMesaRequest $request, $id)
    {
        $mesa = $this->dadosMesa->find($id);

        if(!$mesa){
            return redirect()->back();
        }

        $mesa->update($request->all());
        return redirect()->route('mesa.index')->with('success', 'Dados atualizado com sucesso..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mesa = $this->dadosMesa->find($id);

        if(empty($mesa)){
            return redirect()
            ->back()
            ->with('error', 'Existe Produtos vinculado a essa mesa, portando não pode deletar');
        }
        $mesa->delete();
        return redirect()
            ->route('mesa.index')
            ->with('message', 'Resgistro deletado com sucesso');
    }

    public function search(Request $request){
        $filtros = $request->only('filtrar');

        $mesas = $this->dadosMesa
            ->where(function($query) use($request){
                if($request){
                    $query->orWhere('nome', 'LIKE', "%{$request->filtrar}%")
                    ->orWhere('descricao', 'LIKE', "%{$request->filtrar}%");
                }
            })->paginate();


        return view('admin.mesa.index', compact('mesas', 'filtros'));
    }
}
