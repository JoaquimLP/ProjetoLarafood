<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategoriaRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    private $dadosCategoria;

    public function __construct(Categoria $categoria)
    {
        $this->dadosCategoria = $categoria;
        $this->middleware('can:Categoria');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = $this->dadosCategoria->paginate();
        return view('admin.categoria.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateCategoriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCategoriaRequest $request)
    {
        $this->dadosCategoria->create($request->all());
        return redirect()->route('categoria.index')->with('success', 'Categoria cadastrada com sucesso..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = $this->dadosCategoria->find($id);

        if(!$categoria){
            return redirect()->back();
        }

        return view('admin.categoria.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = $this->dadosCategoria->find($id);

        if(!$categoria){
            return redirect()->back();
        }

        return view('admin.categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateCategoriaRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCategoriaRequest $request, $id)
    {
        $categoria = $this->dadosCategoria->find($id);

        if(!$categoria){
            return redirect()->back();
        }

        $categoria->update($request->all());
        return redirect()->route('categoria.index')->with('success', 'Dados atualizado com sucesso..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = $this->dadosCategoria->find($id);

        if(empty($categoria)){
            return redirect()
            ->back()
            ->with('error', 'Existe Produtos vinculado a essa categoria, portando não pode deletar');
        }
        $categoria->delete();
        return redirect()
            ->route('categoria.index')
            ->with('message', 'Resgistro deletado com sucesso');
    }

    public function search(Request $request){
        $filtros = $request->only('filtrar');

        $categorias = $this->dadosCategoria
            ->where(function($query) use($request){
                if($request){
                    $query->orWhere('nome', 'LIKE', "%{$request->filtrar}%")
                    ->orWhere('descricao', 'LIKE', "%{$request->filtrar}%");
                }
            })->paginate();


        return view('admin.categoria.index', compact('categorias', 'filtros'));
    }
}
